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
        Schema::create('business_stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('business_branches')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('business_products')->cascadeOnDelete();
            $table->string('type'); // purchase_in, sale_out, transfer_in, transfer_out, adjustment_add, adjustment_sub, return_in
            $table->decimal('quantity', 12, 2); // always positive magnitude; direction indicated by type
            $table->decimal('balance_before', 12, 2);
            $table->decimal('balance_after', 12, 2);
            $table->string('reference_type')->nullable(); // 'purchase_order', 'sale', 'transfer', 'adjustment'
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['branch_id', 'product_id']);
            $table->index(['reference_type', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_stock_movements');
    }
};
