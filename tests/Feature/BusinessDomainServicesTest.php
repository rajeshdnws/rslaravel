<?php

namespace Tests\Feature;

use App\Models\Business\BusinessBranch;
use App\Models\Business\BusinessCategory;
use App\Models\Business\BusinessCustomer;
use App\Models\Business\BusinessProduct;
use App\Models\Business\Coupon;
use App\Models\Business\PurchaseOrder;
use App\Models\Business\Supplier;
use App\Services\Business\BillingService;
use App\Services\Business\CouponService;
use App\Services\Business\InventoryService;
use App\Services\Business\LoyaltyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusinessDomainServicesTest extends TestCase
{
    use RefreshDatabase;

    protected InventoryService $inventoryService;
    protected CouponService $couponService;
    protected LoyaltyService $loyaltyService;
    protected BillingService $billingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->inventoryService = app(InventoryService::class);
        $this->couponService = app(CouponService::class);
        $this->loyaltyService = app(LoyaltyService::class);
        $this->billingService = app(BillingService::class);
    }

    public function test_inventory_service_adjust_stock_and_creates_movement_ledger(): void
    {
        $branch = BusinessBranch::create([
            'name' => 'Mumbai Flagship',
            'code' => 'BR-MUM-01',
            'type' => 'flagship',
        ]);

        $category = BusinessCategory::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
        ]);

        $product = BusinessProduct::create([
            'category_id' => $category->id,
            'name' => 'Wireless Barcode Scanner',
            'sku' => 'SKU-SCAN-01',
            'barcode' => '8901234567890',
            'selling_price' => 3500.00,
            'purchase_price' => 2200.00,
            'tax_rate' => 18.00,
        ]);

        // Inward initial stock
        $stock = $this->inventoryService->adjustStock(
            branchId: $branch->id,
            productId: $product->id,
            quantityChange: 50.00,
            movementType: 'adjustment_add',
            notes: 'Initial inventory load'
        );

        $this->assertEquals(50.00, (float) $stock->quantity);
        $this->assertDatabaseHas('business_stock_movements', [
            'branch_id' => $branch->id,
            'product_id' => $product->id,
            'type' => 'adjustment_add',
            'quantity' => 50.00,
            'balance_before' => 0.00,
            'balance_after' => 50.00,
        ]);

        // Deduct 5 units
        $this->inventoryService->adjustStock(
            branchId: $branch->id,
            productId: $product->id,
            quantityChange: -5.00,
            movementType: 'adjustment_sub',
            notes: 'Sample distribution'
        );

        $this->assertEquals(45.00, $product->stockAtBranch($branch->id));
    }

    public function test_inventory_service_inter_branch_transfer_dispatch_and_receipt(): void
    {
        $centralWh = BusinessBranch::create([
            'name' => 'Central Hub Warehouse',
            'code' => 'WH-HQ-01',
            'type' => 'central_warehouse',
        ]);

        $puneStore = BusinessBranch::create([
            'name' => 'Pune Store 1',
            'code' => 'BR-PUN-01',
            'type' => 'retail_counter',
        ]);

        $product = BusinessProduct::create([
            'name' => 'Thermal Receipt Printer 80mm',
            'sku' => 'SKU-PRN-80',
            'selling_price' => 6500.00,
            'purchase_price' => 4500.00,
        ]);

        // Load 100 units at Central Warehouse
        $this->inventoryService->adjustStock(
            branchId: $centralWh->id,
            productId: $product->id,
            quantityChange: 100.00,
            movementType: 'adjustment_add'
        );

        // Dispatch 20 units to Pune Store
        $transfer = $this->inventoryService->dispatchTransfer(
            sourceBranchId: $centralWh->id,
            destBranchId: $puneStore->id,
            items: [
                ['product_id' => $product->id, 'quantity' => 20.00],
            ],
            notes: 'Stock replenishment transfer'
        );

        $this->assertEquals('dispatched', $transfer->status);
        $this->assertEquals(80.00, $product->stockAtBranch($centralWh->id));
        $this->assertEquals(0.00, $product->stockAtBranch($puneStore->id));

        // Receive transfer at Pune Store
        $receivedTransfer = $this->inventoryService->receiveTransfer($transfer->id);

        $this->assertEquals('received', $receivedTransfer->status);
        $this->assertEquals(20.00, $product->stockAtBranch($puneStore->id));
    }

    public function test_inventory_service_grn_goods_receipt_against_purchase_order(): void
    {
        $branch = BusinessBranch::create([
            'name' => 'Delhi Retail',
            'code' => 'BR-DEL-01',
        ]);

        $supplier = Supplier::create([
            'name' => 'Tech Hardware Distributors',
            'gstin' => '07AAAAA0000A1Z5',
        ]);

        $product = BusinessProduct::create([
            'name' => 'Heavy Duty Cash Drawer',
            'sku' => 'SKU-DRW-01',
            'purchase_price' => 3000.00,
            'selling_price' => 4500.00,
        ]);

        $po = PurchaseOrder::create([
            'order_number' => 'PO-2026-TEST-01',
            'supplier_id' => $supplier->id,
            'destination_branch_id' => $branch->id,
            'order_date' => now()->toDateString(),
            'status' => 'ordered',
            'subtotal' => 30000.00,
            'tax_amount' => 5400.00,
            'total_amount' => 35400.00,
        ]);

        $poItem = $po->items()->create([
            'product_id' => $product->id,
            'ordered_quantity' => 10.00,
            'received_quantity' => 0.00,
            'unit_cost' => 3000.00,
            'tax_rate' => 18.00,
            'line_total' => 35400.00,
        ]);

        // Receive partial goods: 6 units
        $this->inventoryService->receiveGoods($po->id, [
            ['item_id' => $poItem->id, 'received_quantity' => 6.00],
        ]);

        $po->refresh();
        $this->assertEquals('received_partial', $po->status);
        $this->assertEquals(6.00, $product->stockAtBranch($branch->id));

        // Receive remaining 4 units
        $this->inventoryService->receiveGoods($po->id, [
            ['item_id' => $poItem->id, 'received_quantity' => 4.00],
        ]);

        $po->refresh();
        $this->assertEquals('received_full', $po->status);
        $this->assertEquals(10.00, $product->stockAtBranch($branch->id));
    }

    public function test_coupon_service_validation_and_discount_calculation(): void
    {
        $percentCoupon = Coupon::create([
            'code' => 'SAVE10',
            'discount_type' => 'percentage',
            'discount_value' => 10.00,
            'min_order_value' => 1000.00,
            'max_discount' => 500.00,
            'is_active' => true,
        ]);

        $flatCoupon = Coupon::create([
            'code' => 'FLAT200',
            'discount_type' => 'fixed',
            'discount_value' => 200.00,
            'min_order_value' => 1500.00,
            'is_active' => true,
        ]);

        // Test percentage discount calculation
        $discount = $this->couponService->calculateDiscount($percentCoupon, 2000.00);
        $this->assertEquals(200.00, $discount);

        // Test max discount ceiling
        $cappedDiscount = $this->couponService->calculateDiscount($percentCoupon, 10000.00);
        $this->assertEquals(500.00, $cappedDiscount);

        // Test fixed discount calculation
        $flatDiscount = $this->couponService->calculateDiscount($flatCoupon, 2000.00);
        $this->assertEquals(200.00, $flatDiscount);

        // Test validation below minimum order value
        $this->expectException(\InvalidArgumentException::class);
        $this->couponService->validateCoupon('FLAT200', 1000.00);
    }

    public function test_loyalty_service_earning_and_wallet_redemption(): void
    {
        $customer = BusinessCustomer::create([
            'name' => 'Rohit Verma',
            'phone' => '9812345678',
            'tier' => 'Silver',
            'wallet_balance_points' => 0,
            'total_spend' => 0.00,
        ]);

        // Award points for spend of ₹26,000 (1% = 260 points, upgrades to Gold)
        $earned = $this->loyaltyService->awardPoints($customer, 26000.00);

        $customer->refresh();
        $this->assertEquals(260, $earned);
        $this->assertEquals(260, $customer->wallet_balance_points);
        $this->assertEquals('Gold', $customer->tier);

        // Redeem 100 points (₹100 value)
        $discountValue = $this->loyaltyService->redeemPoints($customer, 100);

        $customer->refresh();
        $this->assertEquals(100.00, $discountValue);
        $this->assertEquals(160, $customer->wallet_balance_points);

        $this->assertDatabaseHas('business_loyalty_ledgers', [
            'customer_id' => $customer->id,
            'type' => 'redeemed',
            'points' => -100,
            'balance_after' => 160,
        ]);
    }

    public function test_billing_service_full_pos_checkout_flow(): void
    {
        $branch = BusinessBranch::create([
            'name' => 'Bangalore Store',
            'code' => 'BR-BLR-01',
        ]);

        $product1 = BusinessProduct::create([
            'name' => 'Bluetooth POS Thermal Printer',
            'sku' => 'SKU-BLR-PRN',
            'selling_price' => 5000.00,
            'purchase_price' => 3500.00,
            'tax_rate' => 18.00,
        ]);

        $product2 = BusinessProduct::create([
            'name' => 'Barcode Stand & Cable',
            'sku' => 'SKU-BLR-ACC',
            'selling_price' => 1000.00,
            'purchase_price' => 600.00,
            'tax_rate' => 18.00,
        ]);

        // Inward stock
        $this->inventoryService->adjustStock($branch->id, $product1->id, 20.00, 'adjustment_add');
        $this->inventoryService->adjustStock($branch->id, $product2->id, 50.00, 'adjustment_add');

        $customer = BusinessCustomer::create([
            'name' => 'Priya Nair',
            'phone' => '9845012345',
            'wallet_balance_points' => 300,
        ]);

        $coupon = Coupon::create([
            'code' => 'SAVE10',
            'discount_type' => 'percentage',
            'discount_value' => 10.00,
            'min_order_value' => 2000.00,
            'is_active' => true,
        ]);

        // Checkout: 1 unit of product1 (₹5000), 2 units of product2 (₹2000)
        // Subtotal = ₹7,000.00
        // GST (18%) = ₹1,260.00
        // Coupon 10% on subtotal = -₹700.00
        // Loyalty 200 points = -₹200.00
        // Grand Total = (7000 + 1260) - 700 - 200 = ₹7,360.00
        $sale = $this->billingService->checkout(
            branchId: $branch->id,
            items: [
                ['product_id' => $product1->id, 'quantity' => 1.00],
                ['product_id' => $product2->id, 'quantity' => 2.00],
            ],
            paymentMethod: 'split',
            paymentDetails: ['cash' => 3360.00, 'upi' => 4000.00],
            customerId: $customer->id,
            couponCode: 'SAVE10',
            pointsToRedeem: 200,
            notes: 'Test split payment POS sale'
        );

        $this->assertNotNull($sale);
        $this->assertEquals(7000.00, (float) $sale->subtotal);
        $this->assertEquals(1260.00, (float) $sale->tax_amount);
        $this->assertEquals(700.00, (float) $sale->discount_amount);
        $this->assertEquals(200.00, (float) $sale->loyalty_discount_amount);
        $this->assertEquals(7360.00, (float) $sale->grand_total);
        $this->assertEquals('split', $sale->payment_method);

        // Verify inventory deducted
        $this->assertEquals(19.00, $product1->stockAtBranch($branch->id));
        $this->assertEquals(48.00, $product2->stockAtBranch($branch->id));

        // Verify stock movements recorded
        $this->assertDatabaseHas('business_stock_movements', [
            'branch_id' => $branch->id,
            'product_id' => $product1->id,
            'type' => 'sale_out',
            'quantity' => 1.00,
        ]);

        // Verify loyalty points: initial 300 - 200 redeemed + 73 earned (1% of 7360) = 173 points
        $customer->refresh();
        $this->assertEquals(173, $customer->wallet_balance_points);

        // Verify coupon usage incremented
        $coupon->refresh();
        $this->assertEquals(1, $coupon->used_count);
    }
}
