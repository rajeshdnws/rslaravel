<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessBranch extends Model
{
    use HasFactory;

    protected $table = 'business_branches';

    protected $fillable = [
        'name',
        'code',
        'type',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'pincode',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function stocks(): HasMany
    {
        return $this->hasMany(BusinessBranchStock::class, 'branch_id');
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(BusinessStockMovement::class, 'branch_id');
    }

    public function sales(): HasMany
    {
        return $this->hasMany(BusinessSale::class, 'branch_id');
    }

    public function purchaseOrders(): HasMany
    {
        return $this->hasMany(PurchaseOrder::class, 'destination_branch_id');
    }

    public function outgoingTransfers(): HasMany
    {
        return $this->hasMany(StockTransfer::class, 'source_branch_id');
    }

    public function incomingTransfers(): HasMany
    {
        return $this->hasMany(StockTransfer::class, 'destination_branch_id');
    }
}
