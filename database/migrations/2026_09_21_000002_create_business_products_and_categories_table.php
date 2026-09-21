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
        Schema::create('business_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('business_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('business_categories')->nullOnDelete();
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('barcode')->nullable()->index();
            $table->string('hsn_code')->nullable();
            $table->string('unit')->default('Pcs'); // Pcs, Box, Kg, Mtr, Set
            $table->decimal('purchase_price', 12, 2)->default(0.00);
            $table->decimal('selling_price', 12, 2)->default(0.00);
            $table->decimal('tax_rate', 5, 2)->default(18.00); // 18% GST standard
            $table->integer('reorder_level')->default(10);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('business_branch_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('business_branches')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('business_products')->cascadeOnDelete();
            $table->decimal('quantity', 12, 2)->default(0.00);
            $table->timestamps();

            $table->unique(['branch_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_branch_stocks');
        Schema::dropIfExists('business_products');
        Schema::dropIfExists('business_categories');
    }
};
