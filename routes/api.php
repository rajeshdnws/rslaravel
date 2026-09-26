<?php

use App\Http\Controllers\Api\InventoryControlApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RS Inventory Control API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('inventory/v1')->group(function () {
    Route::post('/installations/register', [InventoryControlApiController::class, 'registerInstallation']);
    Route::post('/installations/store-profile', [InventoryControlApiController::class, 'submitStoreProfile']);
    Route::post('/licenses/activate', [InventoryControlApiController::class, 'activateLicense']);
    Route::post('/licenses/validate', [InventoryControlApiController::class, 'validateLicense']);
    Route::post('/installations/heartbeat', [InventoryControlApiController::class, 'sendHeartbeat']);
});
