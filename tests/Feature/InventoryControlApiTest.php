<?php

namespace Tests\Feature;

use App\Models\InventoryInstallation;
use App\Models\InventoryLicense;
use App\Models\InventoryStoreProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryControlApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_installation_registration_creates_record(): void
    {
        $payload = [
            'installation_id' => 'INST-TEST-1001',
            'device_id' => 'DEV-TEST-5001',
            'product' => 'RS_INVENTORY',
            'edition' => 'BUSINESS',
            'app_version' => '1.0.0',
            'os_name' => 'Windows',
            'os_version' => '11.0',
            'installation_source' => 'Website',
            'installed_at' => now()->toISOString(),
        ];

        $response = $this->postJson('/api/inventory/v1/installations/register', $payload);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'data' => [
                'installation_id' => 'INST-TEST-1001',
                'device_id' => 'DEV-TEST-5001',
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => false,
                'license_status' => 'NOT_ACTIVATED',
            ],
        ]);

        $this->assertDatabaseHas('inventory_installations', [
            'installation_id' => 'INST-TEST-1001',
            'device_id' => 'DEV-TEST-5001',
            'registration_status' => 'REGISTERED',
            'license_status' => 'NOT_ACTIVATED',
        ]);
    }

    public function test_store_profile_submission_links_to_installation(): void
    {
        InventoryInstallation::create([
            'installation_id' => 'INST-TEST-1002',
            'device_id' => 'DEV-TEST-5002',
            'product' => 'RS_INVENTORY',
            'edition' => 'BUSINESS',
            'app_version' => '1.0.0',
            'registration_status' => 'REGISTERED',
            'store_profile_completed' => false,
            'license_status' => 'NOT_ACTIVATED',
            'last_seen' => now(),
        ]);

        $storePayload = [
            'installation_id' => 'INST-TEST-1002',
            'store_name' => 'Apex Mega Supermarket',
            'owner_name' => 'Ramesh Agarwal',
            'mobile' => '+91 98765 12345',
            'email' => 'ramesh@apexsupermarket.com',
            'address' => '102 Main Commercial Complex, Sector 18',
            'city' => 'Noida',
            'state' => 'Uttar Pradesh',
            'pincode' => '201301',
            'gstin' => '09AAACA12341Z5',
        ];

        $response = $this->postJson('/api/inventory/v1/installations/store-profile', $storePayload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'installation_id' => 'INST-TEST-1002',
                'store_name' => 'Apex Mega Supermarket',
                'store_profile_completed' => true,
            ],
        ]);

        $this->assertDatabaseHas('inventory_store_profiles', [
            'installation_id' => 'INST-TEST-1002',
            'store_name' => 'Apex Mega Supermarket',
            'mobile' => '+91 98765 12345',
        ]);

        $this->assertDatabaseHas('inventory_installations', [
            'installation_id' => 'INST-TEST-1002',
            'store_profile_completed' => true,
            'license_status' => 'NOT_ACTIVATED', // Remains unactivated unless explicit activation
        ]);
    }

    public function test_license_activation_and_validation(): void
    {
        InventoryInstallation::create([
            'installation_id' => 'INST-TEST-1003',
            'device_id' => 'DEV-TEST-5003',
            'product' => 'RS_INVENTORY',
            'edition' => 'BUSINESS',
            'registration_status' => 'REGISTERED',
            'store_profile_completed' => true,
            'license_status' => 'NOT_ACTIVATED',
        ]);

        $activatePayload = [
            'installation_id' => 'INST-TEST-1003',
            'device_id' => 'DEV-TEST-5003',
            'license_key' => 'RS-BIZ-9988-7766-5544',
            'app_version' => '1.0.0',
        ];

        $actResponse = $this->postJson('/api/inventory/v1/licenses/activate', $activatePayload);

        $actResponse->assertStatus(200);
        $actResponse->assertJson([
            'success' => true,
            'message' => 'License Activated Successfully',
            'data' => [
                'license_status' => 'ACTIVE',
            ],
        ]);

        $this->assertDatabaseHas('inventory_installations', [
            'installation_id' => 'INST-TEST-1003',
            'license_status' => 'ACTIVE',
        ]);

        $valResponse = $this->postJson('/api/inventory/v1/licenses/validate', [
            'installation_id' => 'INST-TEST-1003',
            'device_id' => 'DEV-TEST-5003',
        ]);

        $valResponse->assertStatus(200);
        $valResponse->assertJson([
            'valid' => true,
            'license_status' => 'ACTIVE',
        ]);
    }

    public function test_heartbeat_updates_last_seen(): void
    {
        $inst = InventoryInstallation::create([
            'installation_id' => 'INST-TEST-1004',
            'device_id' => 'DEV-TEST-5004',
            'app_version' => '1.0.0',
            'registration_status' => 'REGISTERED',
            'last_seen' => now()->subDays(5),
        ]);

        $response = $this->postJson('/api/inventory/v1/installations/heartbeat', [
            'installation_id' => 'INST-TEST-1004',
            'device_id' => 'DEV-TEST-5004',
            'app_version' => '1.0.1', // Updated version
            'os_name' => 'Windows',
            'os_version' => '11.0',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $inst->refresh();
        $this->assertEquals('1.0.1', $inst->app_version);
        $this->assertTrue($inst->last_seen->isToday());
    }

    public function test_unactivated_installation_is_persisted_for_admin(): void
    {
        // Scenario: Install -> Register -> Complete Store Profile -> NEVER activate
        $inst = InventoryInstallation::create([
            'installation_id' => 'INST-UNACTIVATED-01',
            'device_id' => 'DEV-001',
            'product' => 'RS_INVENTORY',
            'edition' => 'BUSINESS',
            'app_version' => '1.0.0',
            'registration_status' => 'REGISTERED',
            'store_profile_completed' => true,
            'license_status' => 'NOT_ACTIVATED',
            'last_seen' => now(),
        ]);

        InventoryStoreProfile::create([
            'installation_id' => 'INST-UNACTIVATED-01',
            'store_name' => 'Unactivated Supermart',
            'owner_name' => 'John Doe',
            'mobile' => '+91 90000 11111',
            'address' => 'Sample Address',
        ]);

        $this->assertDatabaseHas('inventory_installations', [
            'installation_id' => 'INST-UNACTIVATED-01',
            'registration_status' => 'REGISTERED',
            'store_profile_completed' => true,
            'license_status' => 'NOT_ACTIVATED',
        ]);

        $this->assertDatabaseHas('inventory_store_profiles', [
            'installation_id' => 'INST-UNACTIVATED-01',
            'store_name' => 'Unactivated Supermart',
        ]);
    }
}
