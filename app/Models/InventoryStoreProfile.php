<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryStoreProfile extends Model
{
    use HasFactory;

    protected $table = 'inventory_store_profiles';

    protected $fillable = [
        'installation_id',
        'store_name',
        'owner_name',
        'mobile',
        'email',
        'address',
        'city',
        'state',
        'pincode',
        'gstin',
    ];

    public function installation(): BelongsTo
    {
        return $this->belongsTo(InventoryInstallation::class, 'installation_id', 'installation_id');
    }
}
