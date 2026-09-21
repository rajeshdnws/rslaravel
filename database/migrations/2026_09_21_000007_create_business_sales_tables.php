<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // e.g. INV-2026-0001
            $table->foreignId('branch_id')->constrained('business_branches');
            $table->foreignId('customer_id')->nullable()->constrained('business_customers')->nullOnDelete();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('tax_amount', 12, 2);
            $table->decimal('discount_amount', 12, 2)->default(0.00);
            $table->string('coupon_code')->nullable();
            $table->integer('loyalty_points_redeemed')->default(0);
            $table->decimal('loyalty_discount_amount', 12, 2)->default(0.00);
            $table->integer('loyalty_points_earned')->default(0);
            $table->decimal('grand_total', 12, 2);
            $table->string('payment_method')->default('cash'); // 'cash', 'card', 'upi', 'split'
            $table->json('payment_details')->nullable(); // e.g. {"cash": 2000, "upi": 2500}
            $table->string('status')->default('completed'); // 'completed', 'refunded', 'cancelled'
            $table->text('notes')->nullable();
            $table->foreignId('cashier_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['branch_id', 'created_at']);
        });

        Schema::create('business_sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('business_sales')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('business_products');
            $table->decimal('quantity', 12, 2);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('tax_rate', 5, 2)->default(18.00);
            $table->decimal('tax_amount', 12, 2);
            $table->decimal('total_amount', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_sale_items');
        Schema::dropIfExists('business_sales');
    }
};
