<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InventoryInstallation extends Model
{
    use HasFactory;

    protected $table = 'inventory_installations';

    protected $fillable = [
        'installation_id',
        'device_id',
        'product',
        'edition',
        'app_version',
        'os_name',
        'os_version',
        'installation_source',
        'registration_status',
        'store_profile_completed',
        'license_status',
        'installed_at',
        'last_seen',
    ];

    protected $casts = [
        'store_profile_completed' => 'boolean',
        'installed_at' => 'datetime',
        'last_seen' => 'datetime',
    ];

    public function storeProfile(): HasOne
    {
        return $this->hasOne(InventoryStoreProfile::class, 'installation_id', 'installation_id');
    }
}
