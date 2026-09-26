<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLicense extends Model
{
    use HasFactory;

    protected $table = 'inventory_licenses';

    protected $fillable = [
        'license_key',
        'product',
        'edition',
        'status',
        'assigned_installation_id',
        'assigned_device_id',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
