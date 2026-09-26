<?php

namespace Database\Seeders;

use App\Models\InventoryInstallation;
use App\Models\InventoryLicense;
use App\Models\InventoryStoreProfile;
use Illuminate\Database\Seeder;

class InventoryControlSeeder extends Seeder
{
    /**
     * Run the database seeds for RS Inventory Control API testing.
     */
    public function run(): void
    {
        // 1. Seed Dummy Installations and Store Profiles
        
        // Installation 1: Active Enterprise License
        $inst1 = InventoryInstallation::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1001'],
            [
                'device_id' => 'DEV-POS-SERVER-01',
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'app_version' => '1.0.0',
                'os_name' => 'Windows',
                'os_version' => '11 Pro',
                'installation_source' => 'Direct Sales',
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => true,
                'license_status' => 'ACTIVE',
                'installed_at' => now()->subMonths(3),
                'last_seen' => now()->subMinutes(5),
            ]
        );

        InventoryStoreProfile::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1001'],
            [
                'store_name' => 'Downtown Hypermarket Pvt Ltd',
                'owner_name' => 'Rajesh Sharma',
                'mobile' => '+91 98765 43210',
                'email' => 'contact@downtownhyper.com',
                'address' => 'Plot 45, Commercial Complex, MG Road',
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'pincode' => '400001',
                'gstin' => '27AAACD9876A1Z5',
            ]
        );

        // Installation 2: Registered + Store Profile Completed, NOT ACTIVATED
        $inst2 = InventoryInstallation::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1002'],
            [
                'device_id' => 'DEV-LAPTOP-102',
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'app_version' => '1.0.0',
                'os_name' => 'Windows',
                'os_version' => '11 Home',
                'installation_source' => 'Website',
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => true,
                'license_status' => 'NOT_ACTIVATED',
                'installed_at' => now()->subDays(2),
                'last_seen' => now()->subHours(1),
            ]
        );

        InventoryStoreProfile::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1002'],
            [
                'store_name' => 'Suburban Express Mart',
                'owner_name' => 'Anil Verma',
                'mobile' => '+91 98123 45678',
                'email' => 'anil@suburbanmart.in',
                'address' => 'Shop 12, Sunrise Residency, Sector 62',
                'city' => 'Noida',
                'state' => 'Uttar Pradesh',
                'pincode' => '201309',
                'gstin' => '09AAABV5678F1Z2',
            ]
        );

        // Installation 3: Expired License
        $inst3 = InventoryInstallation::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1003'],
            [
                'device_id' => 'DEV-DESKTOP-409',
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'app_version' => '0.9.8',
                'os_name' => 'Windows',
                'os_version' => '10 Enterprise',
                'installation_source' => 'Partner',
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => true,
                'license_status' => 'EXPIRED',
                'installed_at' => now()->subYears(1),
                'last_seen' => now()->subDays(10),
            ]
        );

        InventoryStoreProfile::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1003'],
            [
                'store_name' => 'Central Logistics & Distribution Hub',
                'owner_name' => 'Karan Malhotra',
                'mobile' => '+91 99000 88776',
                'email' => 'karan@centrallogistics.co.in',
                'address' => 'Industrial Area Phase 2, Near Toll Plaza',
                'city' => 'Bengaluru',
                'state' => 'Karnataka',
                'pincode' => '560058',
                'gstin' => '29AAACK4321A1Z9',
            ]
        );

        // Installation 4: Trial / Incomplete Store Profile
        InventoryInstallation::updateOrCreate(
            ['installation_id' => 'INST-BIZ-1004'],
            [
                'device_id' => 'DEV-COUNTER-03',
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'app_version' => '1.0.0',
                'os_name' => 'Windows',
                'os_version' => '11',
                'installation_source' => 'Trial',
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => false,
                'license_status' => 'NOT_ACTIVATED',
                'installed_at' => now()->subHours(4),
                'last_seen' => now()->subMinutes(15),
            ]
        );

        // 2. Seed Dummy Licenses
        
        InventoryLicense::updateOrCreate(
            ['license_key' => 'RS-BIZ-ENTERPRISE-2026'],
            [
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'status' => 'ACTIVE',
                'assigned_installation_id' => 'INST-BIZ-1001',
                'assigned_device_id' => 'DEV-POS-SERVER-01',
                'expires_at' => now()->addYear(),
            ]
        );

        InventoryLicense::updateOrCreate(
            ['license_key' => 'RS-BIZ-9988-7766-5544'],
            [
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'status' => 'UNASSIGNED',
                'assigned_installation_id' => null,
                'assigned_device_id' => null,
                'expires_at' => now()->addMonths(6),
            ]
        );

        InventoryLicense::updateOrCreate(
            ['license_key' => 'RS-BIZ-1122-3344-5566'],
            [
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'status' => 'UNASSIGNED',
                'assigned_installation_id' => null,
                'assigned_device_id' => null,
                'expires_at' => now()->addYear(),
            ]
        );

        InventoryLicense::updateOrCreate(
            ['license_key' => 'RS-BIZ-EXPIRED-2025'],
            [
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'status' => 'EXPIRED',
                'assigned_installation_id' => 'INST-BIZ-1003',
                'assigned_device_id' => 'DEV-DESKTOP-409',
                'expires_at' => now()->subDays(30),
            ]
        );

        InventoryLicense::updateOrCreate(
            ['license_key' => 'RS-BIZ-REVOKED-9999'],
            [
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'status' => 'REVOKED',
                'assigned_installation_id' => null,
                'assigned_device_id' => null,
                'expires_at' => null,
            ]
        );
    }
}
