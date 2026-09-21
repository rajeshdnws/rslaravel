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
        Schema::create('business_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('gstin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('business_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // e.g. PO-2026-0001
            $table->foreignId('supplier_id')->constrained('business_suppliers');
            $table->foreignId('destination_branch_id')->constrained('business_branches');
            $table->date('order_date');
            $table->date('expected_date')->nullable();
            $table->string('status')->default('draft'); // draft, ordered, received_partial, received_full, cancelled
            $table->decimal('subtotal', 12, 2)->default(0.00);
            $table->decimal('tax_amount', 12, 2)->default(0.00);
            $table->decimal('total_amount', 12, 2)->default(0.00);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('business_purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained('business_purchase_orders')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('business_products');
            $table->decimal('ordered_quantity', 12, 2);
            $table->decimal('received_quantity', 12, 2)->default(0.00);
            $table->decimal('unit_cost', 12, 2);
            $table->decimal('tax_rate', 5, 2)->default(18.00);
            $table->decimal('line_total', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_purchase_order_items');
        Schema::dropIfExists('business_purchase_orders');
        Schema::dropIfExists('business_suppliers');
    }
};
