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
        Schema::create('business_stock_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('transfer_number')->unique(); // e.g. TRF-2026-0001
            $table->foreignId('source_branch_id')->constrained('business_branches');
            $table->foreignId('destination_branch_id')->constrained('business_branches');
            $table->string('status')->default('dispatched'); // 'pending', 'dispatched', 'in_transit', 'received', 'cancelled'
            $table->timestamp('dispatched_at')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('dispatched_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('received_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('business_stock_transfer_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_id')->constrained('business_stock_transfers')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('business_products');
            $table->decimal('quantity', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_stock_transfer_items');
        Schema::dropIfExists('business_stock_transfers');
    }
};
