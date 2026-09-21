<?php

namespace App\Services\Business;

use App\Models\Business\BusinessBranch;
use App\Models\Business\BusinessCustomer;
use App\Models\Business\BusinessProduct;
use App\Models\Business\BusinessSale;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class BillingService
{
    public function __construct(
        protected InventoryService $inventoryService,
        protected CouponService $couponService,
        protected LoyaltyService $loyaltyService
    ) {}

    /**
     * Process and complete a POS retail sale.
     */
    public function checkout(
        int $branchId,
        array $items, // [ ['product_id' => 1, 'quantity' => 2], ... ]
        string $paymentMethod = 'cash',
        ?array $paymentDetails = null,
        ?int $customerId = null,
        ?string $couponCode = null,
        int $pointsToRedeem = 0,
        ?int $cashierUserId = null,
        ?string $notes = null
    ): BusinessSale {
        if (empty($items)) {
            throw new InvalidArgumentException("Cart items cannot be empty for billing.");
        }

        return DB::transaction(function () use (
            $branchId,
            $items,
            $paymentMethod,
            $paymentDetails,
            $customerId,
            $couponCode,
            $pointsToRedeem,
            $cashierUserId,
            $notes
        ) {
            $branch = BusinessBranch::findOrFail($branchId);
            $customer = $customerId ? BusinessCustomer::find($customerId) : null;

            // Compute line totals and base amounts
            $subtotal = 0.00;
            $taxAmount = 0.00;
            $processedItems = [];

            foreach ($items as $itemData) {
                $product = BusinessProduct::findOrFail($itemData['product_id']);
                $qty = (float) $itemData['quantity'];
                $unitPrice = (float) $product->selling_price;
                $lineSubtotal = $unitPrice * $qty;
                $taxRate = (float) $product->tax_rate;
                $lineTax = round(($lineSubtotal * $taxRate) / 100, 2);
                $lineTotal = $lineSubtotal + $lineTax;

                $subtotal += $lineSubtotal;
                $taxAmount += $lineTax;

                $processedItems[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'unit_price' => $unitPrice,
                    'tax_rate' => $taxRate,
                    'tax_amount' => $lineTax,
                    'total_amount' => $lineTotal,
                ];
            }

            // Coupon discount calculation
            $coupon = null;
            $couponDiscount = 0.00;
            if (!empty($couponCode)) {
                $coupon = $this->couponService->validateCoupon($couponCode, $subtotal);
                $couponDiscount = $this->couponService->calculateDiscount($coupon, $subtotal);
            }

            // Customer loyalty point redemption
            $loyaltyDiscount = 0.00;
            if ($customer && $pointsToRedeem > 0) {
                $loyaltyDiscount = $this->loyaltyService->calculatePointsValue($pointsToRedeem);
                // Ensure loyalty discount doesn't exceed post-coupon amount
                $maxPossibleRedemption = max(0, ($subtotal + $taxAmount) - $couponDiscount);
                if ($loyaltyDiscount > $maxPossibleRedemption) {
                    $loyaltyDiscount = $maxPossibleRedemption;
                }
            }

            $grandTotal = max(0.00, round(($subtotal + $taxAmount) - $couponDiscount - $loyaltyDiscount, 2));

            // Generate invoice number
            $invoiceCount = BusinessSale::count() + 1;
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . str_pad((string) $invoiceCount, 5, '0', STR_PAD_LEFT);

            // Create sale record
            $sale = BusinessSale::create([
                'invoice_number' => $invoiceNumber,
                'branch_id' => $branch->id,
                'customer_id' => $customer?->id,
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'discount_amount' => $couponDiscount,
                'coupon_code' => $coupon?->code,
                'loyalty_points_redeemed' => $pointsToRedeem,
                'loyalty_discount_amount' => $loyaltyDiscount,
                'loyalty_points_earned' => 0, // will update below
                'grand_total' => $grandTotal,
                'payment_method' => $paymentMethod,
                'payment_details' => $paymentDetails,
                'status' => 'completed',
                'notes' => $notes,
                'cashier_user_id' => $cashierUserId,
            ]);

            // Save sale line items and adjust inventory
            foreach ($processedItems as $pItem) {
                $sale->items()->create([
                    'product_id' => $pItem['product']->id,
                    'quantity' => $pItem['quantity'],
                    'unit_price' => $pItem['unit_price'],
                    'tax_rate' => $pItem['tax_rate'],
                    'tax_amount' => $pItem['tax_amount'],
                    'total_amount' => $pItem['total_amount'],
                ]);

                // Deduct stock from the branch
                $this->inventoryService->adjustStock(
                    branchId: $branch->id,
                    productId: $pItem['product']->id,
                    quantityChange: -$pItem['quantity'],
                    movementType: 'sale_out',
                    referenceType: 'sale',
                    referenceId: $sale->id,
                    notes: "Billed on invoice {$invoiceNumber}",
                    userId: $cashierUserId
                );
            }

            // Execute loyalty point redemption ledger update
            if ($customer && $pointsToRedeem > 0) {
                $this->loyaltyService->redeemPoints(
                    customer: $customer,
                    points: $pointsToRedeem,
                    referenceType: 'sale',
                    referenceId: $sale->id,
                    description: "Redeemed {$pointsToRedeem} points on invoice {$invoiceNumber}"
                );
            }

            // Award loyalty points for net spend
            if ($customer && $grandTotal > 0) {
                $pointsEarned = $this->loyaltyService->awardPoints(
                    customer: $customer,
                    netSpend: $grandTotal,
                    referenceType: 'sale',
                    referenceId: $sale->id
                );
                $sale->update(['loyalty_points_earned' => $pointsEarned]);
            }

            // Record coupon usage
            if ($coupon) {
                $this->couponService->recordUsage($coupon);
            }

            return $sale->load(['items.product', 'branch', 'customer']);
        });
    }
}
