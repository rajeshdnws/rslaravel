<?php

namespace App\Services\Business;

use App\Models\Business\BusinessBranchStock;
use App\Models\Business\BusinessProduct;
use App\Models\Business\BusinessStockMovement;
use App\Models\Business\PurchaseOrder;
use App\Models\Business\StockTransfer;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class InventoryService
{
    /**
     * Adjust stock for a product at a specific branch.
     */
    public function adjustStock(
        int $branchId,
        int $productId,
        float $quantityChange,
        string $movementType,
        ?string $referenceType = null,
        ?int $referenceId = null,
        ?string $notes = null,
        ?int $userId = null
    ): BusinessBranchStock {
        return DB::transaction(function () use ($branchId, $productId, $quantityChange, $movementType, $referenceType, $referenceId, $notes, $userId) {
            $stock = BusinessBranchStock::firstOrCreate(
                ['branch_id' => $branchId, 'product_id' => $productId],
                ['quantity' => 0.00]
            );

            $balanceBefore = (float) $stock->quantity;
            $newQuantity = $balanceBefore + $quantityChange;

            if ($newQuantity < 0 && !in_array($movementType, ['adjustment_sub', 'sale_out'])) {
                throw new InvalidArgumentException("Insufficient stock at branch ID {$branchId} for product ID {$productId}. Current: {$balanceBefore}, Requested change: {$quantityChange}");
            }

            $stock->quantity = $newQuantity;
            $stock->save();

            BusinessStockMovement::create([
                'branch_id' => $branchId,
                'product_id' => $productId,
                'type' => $movementType,
                'quantity' => abs($quantityChange),
                'balance_before' => $balanceBefore,
                'balance_after' => $newQuantity,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
                'notes' => $notes,
                'user_id' => $userId,
            ]);

            return $stock;
        });
    }

    /**
     * Dispatch an inter-branch stock transfer.
     */
    public function dispatchTransfer(
        int $sourceBranchId,
        int $destBranchId,
        array $items, // [ ['product_id' => 1, 'quantity' => 10], ... ]
        ?string $notes = null,
        ?int $userId = null
    ): StockTransfer {
        return DB::transaction(function () use ($sourceBranchId, $destBranchId, $items, $notes, $userId) {
            $transferCount = StockTransfer::count() + 1;
            $transferNumber = 'TRF-' . date('Ymd') . '-' . str_pad((string) $transferCount, 4, '0', STR_PAD_LEFT);

            $transfer = StockTransfer::create([
                'transfer_number' => $transferNumber,
                'source_branch_id' => $sourceBranchId,
                'destination_branch_id' => $destBranchId,
                'status' => 'dispatched',
                'dispatched_at' => now(),
                'notes' => $notes,
                'dispatched_by_user_id' => $userId,
            ]);

            foreach ($items as $item) {
                $productId = (int) $item['product_id'];
                $qty = (float) $item['quantity'];

                $transfer->items()->create([
                    'product_id' => $productId,
                    'quantity' => $qty,
                ]);

                // Deduct stock from source branch
                $this->adjustStock(
                    branchId: $sourceBranchId,
                    productId: $productId,
                    quantityChange: -$qty,
                    movementType: 'transfer_out',
                    referenceType: 'transfer',
                    referenceId: $transfer->id,
                    notes: "Dispatched transfer {$transferNumber} to branch ID {$destBranchId}",
                    userId: $userId
                );
            }

            return $transfer;
        });
    }

    /**
     * Receive an in-transit inter-branch stock transfer.
     */
    public function receiveTransfer(int $transferId, ?int $userId = null): StockTransfer
    {
        return DB::transaction(function () use ($transferId, $userId) {
            $transfer = StockTransfer::with('items')->findOrFail($transferId);

            if ($transfer->status === 'received') {
                throw new InvalidArgumentException("Transfer {$transfer->transfer_number} has already been received.");
            }

            foreach ($transfer->items as $item) {
                // Increment stock at destination branch
                $this->adjustStock(
                    branchId: $transfer->destination_branch_id,
                    productId: $item->product_id,
                    quantityChange: (float) $item->quantity,
                    movementType: 'transfer_in',
                    referenceType: 'transfer',
                    referenceId: $transfer->id,
                    notes: "Received transfer {$transfer->transfer_number} from branch ID {$transfer->source_branch_id}",
                    userId: $userId
                );
            }

            $transfer->update([
                'status' => 'received',
                'received_at' => now(),
                'received_by_user_id' => $userId,
            ]);

            return $transfer;
        });
    }

    /**
     * Receive Goods Received Note (GRN) for a Purchase Order.
     */
    public function receiveGoods(
        int $purchaseOrderId,
        array $receivedItems, // [ ['item_id' => 1, 'received_quantity' => 10], ... ]
        ?int $userId = null
    ): PurchaseOrder {
        return DB::transaction(function () use ($purchaseOrderId, $receivedItems, $userId) {
            $order = PurchaseOrder::with('items')->findOrFail($purchaseOrderId);
            $allReceived = true;

            foreach ($receivedItems as $received) {
                $item = $order->items->firstWhere('id', $received['item_id']);
                if (!$item) {
                    continue;
                }

                $qtyReceived = (float) $received['received_quantity'];
                $item->received_quantity += $qtyReceived;
                $item->save();

                // Increment stock at destination branch
                $this->adjustStock(
                    branchId: $order->destination_branch_id,
                    productId: $item->product_id,
                    quantityChange: $qtyReceived,
                    movementType: 'purchase_in',
                    referenceType: 'purchase_order',
                    referenceId: $order->id,
                    notes: "GRN received for PO {$order->order_number}",
                    userId: $userId
                );
            }

            // Check if all lines received full quantity
            foreach ($order->items as $item) {
                if ($item->received_quantity < $item->ordered_quantity) {
                    $allReceived = false;
                    break;
                }
            }

            $order->status = $allReceived ? 'received_full' : 'received_partial';
            $order->save();

            return $order;
        });
    }
}
