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
        Schema::create('business_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->index();
            $table->string('email')->nullable();
            $table->string('tier')->default('Silver'); // Silver, Gold, Platinum
            $table->integer('wallet_balance_points')->default(0);
            $table->decimal('total_spend', 12, 2)->default(0.00);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('business_loyalty_ledgers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('business_customers')->cascadeOnDelete();
            $table->string('type'); // 'earned', 'redeemed', 'adjusted', 'reversed'
            $table->integer('points'); // positive for earned, negative for redeemed
            $table->integer('balance_after');
            $table->string('reference_type')->nullable(); // 'sale', 'manual'
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['customer_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_loyalty_ledgers');
        Schema::dropIfExists('business_customers');
    }
};
