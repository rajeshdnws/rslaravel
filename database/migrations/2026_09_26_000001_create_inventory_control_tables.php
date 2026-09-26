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
        Schema::create('inventory_installations', function (Blueprint $table) {
            $table->id();
            $table->string('installation_id')->unique();
            $table->string('device_id')->nullable();
            $table->string('product')->default('RS_INVENTORY');
            $table->string('edition')->default('BUSINESS');
            $table->string('app_version')->default('1.0.0');
            $table->string('os_name')->nullable();
            $table->string('os_version')->nullable();
            $table->string('installation_source')->nullable(); // Website, Trial, Direct Sales, Partner, Demo, Referral, Other
            $table->string('registration_status')->default('REGISTERED');
            $table->boolean('store_profile_completed')->default(false);
            $table->string('license_status')->default('NOT_ACTIVATED'); // NOT_ACTIVATED, ACTIVE, EXPIRED, REVOKED
            $table->timestamp('installed_at')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->timestamps();
        });

        Schema::create('inventory_store_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('installation_id')->index();
            $table->string('store_name');
            $table->string('owner_name')->nullable();
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('gstin')->nullable();
            $table->timestamps();
        });

        Schema::create('inventory_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('license_key')->unique();
            $table->string('product')->default('RS_INVENTORY');
            $table->string('edition')->default('BUSINESS');
            $table->string('status')->default('UNASSIGNED'); // UNASSIGNED, ACTIVE, EXPIRED, REVOKED
            $table->string('assigned_installation_id')->nullable();
            $table->string('assigned_device_id')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_licenses');
        Schema::dropIfExists('inventory_store_profiles');
        Schema::dropIfExists('inventory_installations');
    }
};
