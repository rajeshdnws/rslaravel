<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InventoryInstallation;
use App\Models\InventoryLicense;
use App\Models\InventoryStoreProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class InventoryControlApiController extends Controller
{
    /**
     * Register a new or existing application installation.
     * POST /api/inventory/v1/installations/register
     */
    public function registerInstallation(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'installation_id' => ['required', 'string', 'max:100'],
            'device_id' => ['required', 'string', 'max:100'],
            'product' => ['nullable', 'string', 'max:50'],
            'edition' => ['nullable', 'string', 'max:50'],
            'app_version' => ['nullable', 'string', 'max:30'],
            'os_name' => ['nullable', 'string', 'max:50'],
            'os_version' => ['nullable', 'string', 'max:50'],
            'installation_source' => ['nullable', 'string', 'max:50'],
            'installed_at' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $installedAt = $request->input('installed_at') 
            ? Carbon::parse($request->input('installed_at')) 
            : now();

        $installation = InventoryInstallation::where('installation_id', $request->input('installation_id'))->first();

        if (!$installation) {
            $installation = InventoryInstallation::create([
                'installation_id' => $request->input('installation_id'),
                'device_id' => $request->input('device_id'),
                'product' => $request->input('product', 'RS_INVENTORY'),
                'edition' => $request->input('edition', 'BUSINESS'),
                'app_version' => $request->input('app_version', '1.0.0'),
                'os_name' => $request->input('os_name', 'Windows'),
                'os_version' => $request->input('os_version', '11.0'),
                'installation_source' => $request->input('installation_source', 'Website'),
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => false,
                'license_status' => 'NOT_ACTIVATED',
                'installed_at' => $installedAt,
                'last_seen' => now(),
            ]);
        } else {
            $installation->update([
                'device_id' => $request->input('device_id'),
                'app_version' => $request->input('app_version', $installation->app_version),
                'os_name' => $request->input('os_name', $installation->os_name),
                'os_version' => $request->input('os_version', $installation->os_version),
                'last_seen' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Installation registered successfully',
            'data' => [
                'installation_id' => $installation->installation_id,
                'device_id' => $installation->device_id,
                'registration_status' => $installation->registration_status,
                'store_profile_completed' => (bool) $installation->store_profile_completed,
                'license_status' => $installation->license_status,
                'registered_at' => $installation->created_at->toISOString(),
            ],
        ], 201);
    }

    /**
     * Submit or update store profile for an installation.
     * POST /api/inventory/v1/installations/store-profile
     */
    public function submitStoreProfile(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'installation_id' => ['required', 'string', 'max:100'],
            'store_name' => ['required', 'string', 'max:150'],
            'owner_name' => ['nullable', 'string', 'max:150'],
            'mobile' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:150'],
            'address' => ['required', 'string', 'max:500'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'pincode' => ['nullable', 'string', 'max:20'],
            'gstin' => ['nullable', 'string', 'max:30'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $installationId = $request->input('installation_id');

        // Ensure installation record exists
        $installation = InventoryInstallation::firstOrCreate(
            ['installation_id' => $installationId],
            [
                'device_id' => 'DEV-UNKNOWN',
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'app_version' => '1.0.0',
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => true,
                'license_status' => 'NOT_ACTIVATED',
                'last_seen' => now(),
            ]
        );

        $storeProfile = InventoryStoreProfile::updateOrCreate(
            ['installation_id' => $installationId],
            [
                'store_name' => $request->input('store_name'),
                'owner_name' => $request->input('owner_name'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'pincode' => $request->input('pincode'),
                'gstin' => $request->input('gstin'),
            ]
        );

        $installation->update([
            'store_profile_completed' => true,
            'last_seen' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Store profile updated successfully',
            'data' => [
                'installation_id' => $installation->installation_id,
                'store_name' => $storeProfile->store_name,
                'store_profile_completed' => true,
                'license_status' => $installation->license_status,
            ],
        ], 200);
    }

    /**
     * Activate product license key.
     * POST /api/inventory/v1/licenses/activate
     */
    public function activateLicense(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'installation_id' => ['required', 'string', 'max:100'],
            'device_id' => ['required', 'string', 'max:100'],
            'license_key' => ['required', 'string', 'max:100'],
            'app_version' => ['nullable', 'string', 'max:30'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid activation request parameters.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $key = strtoupper(trim($request->input('license_key')));
        $installationId = $request->input('installation_id');
        $deviceId = $request->input('device_id');

        // Check if license exists in DB or is a valid trial/demo key format (e.g., starts with RS- or DEMO-)
        $license = InventoryLicense::where('license_key', $key)->first();

        // If license record does not exist yet, allow keys formatted like RS-BIZ-XXXX-XXXX or test keys
        if (!$license && (str_starts_with($key, 'RS-') || str_starts_with($key, 'BIZ-') || str_starts_with($key, 'DEMO-') || strlen($key) >= 8)) {
            $license = InventoryLicense::create([
                'license_key' => $key,
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'status' => 'ACTIVE',
                'assigned_installation_id' => $installationId,
                'assigned_device_id' => $deviceId,
                'expires_at' => now()->addYear(),
            ]);
        }

        if (!$license || $license->status === 'REVOKED' || $license->status === 'EXPIRED') {
            return response()->json([
                'success' => false,
                'message' => 'The provided license key is invalid, revoked, or expired. Please check your key or contact support.',
            ], 400);
        }

        // Activate license
        $license->update([
            'status' => 'ACTIVE',
            'assigned_installation_id' => $installationId,
            'assigned_device_id' => $deviceId,
            'expires_at' => $license->expires_at ?? now()->addYear(),
        ]);

        // Update installation status
        $installation = InventoryInstallation::where('installation_id', $installationId)->first();
        if ($installation) {
            $installation->update([
                'license_status' => 'ACTIVE',
                'last_seen' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'License Activated Successfully',
            'data' => [
                'installation_id' => $installationId,
                'license_key' => $license->license_key,
                'license_status' => 'ACTIVE',
                'expires_at' => $license->expires_at ? $license->expires_at->toFormattedDateString() : 'Lifetime',
            ],
        ], 200);
    }

    /**
     * Validate an activated license.
     * POST /api/inventory/v1/licenses/validate
     */
    public function validateLicense(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'installation_id' => ['required', 'string', 'max:100'],
            'device_id' => ['nullable', 'string', 'max:100'],
            'license_key' => ['nullable', 'string', 'max:100'],
        ]);

        if ($validator->fails()) {
            return response()->json(['valid' => false, 'message' => 'Invalid parameters'], 422);
        }

        $installationId = $request->input('installation_id');
        $installation = InventoryInstallation::where('installation_id', $installationId)->first();

        if (!$installation) {
            return response()->json([
                'valid' => false,
                'license_status' => 'NOT_ACTIVATED',
                'message' => 'Installation record not found.',
            ], 404);
        }

        $isActive = ($installation->license_status === 'ACTIVE');

        return response()->json([
            'valid' => $isActive,
            'license_status' => $installation->license_status,
            'store_profile_completed' => (bool) $installation->store_profile_completed,
            'last_validated_at' => now()->toISOString(),
        ], 200);
    }

    /**
     * Send heartbeat telemetry.
     * POST /api/inventory/v1/installations/heartbeat
     */
    public function sendHeartbeat(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'installation_id' => ['required', 'string', 'max:100'],
            'device_id' => ['nullable', 'string', 'max:100'],
            'app_version' => ['nullable', 'string', 'max:30'],
            'os_name' => ['nullable', 'string', 'max:50'],
            'os_version' => ['nullable', 'string', 'max:50'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid parameters'], 422);
        }

        $installationId = $request->input('installation_id');

        $installation = InventoryInstallation::where('installation_id', $installationId)->first();

        if ($installation) {
            $installation->update([
                'last_seen' => now(),
                'app_version' => $request->input('app_version', $installation->app_version),
                'os_name' => $request->input('os_name', $installation->os_name),
                'os_version' => $request->input('os_version', $installation->os_version),
            ]);
        } else {
            $installation = InventoryInstallation::create([
                'installation_id' => $installationId,
                'device_id' => $request->input('device_id', 'DEV-UNKNOWN'),
                'product' => 'RS_INVENTORY',
                'edition' => 'BUSINESS',
                'app_version' => $request->input('app_version', '1.0.0'),
                'os_name' => $request->input('os_name', 'Windows'),
                'os_version' => $request->input('os_version', '11.0'),
                'registration_status' => 'REGISTERED',
                'store_profile_completed' => false,
                'license_status' => 'NOT_ACTIVATED',
                'last_seen' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Heartbeat received',
            'last_seen' => $installation->last_seen ? $installation->last_seen->toISOString() : now()->toISOString(),
        ], 200);
    }
}
