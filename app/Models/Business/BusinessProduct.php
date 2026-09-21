<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessProduct extends Model
{
    use HasFactory;

    protected $table = 'business_products';

    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'barcode',
        'hsn_code',
        'unit',
        'purchase_price',
        'selling_price',
        'tax_rate',
        'reorder_level',
        'is_active',
    ];

    protected $casts = [
        'purchase_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'reorder_level' => 'integer',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BusinessCategory::class, 'category_id');
    }

    public function branchStocks(): HasMany
    {
        return $this->hasMany(BusinessBranchStock::class, 'product_id');
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(BusinessStockMovement::class, 'product_id');
    }

    public function totalStock(): float
    {
        return (float) $this->branchStocks()->sum('quantity');
    }

    public function stockAtBranch(int $branchId): float
    {
        return (float) ($this->branchStocks()->where('branch_id', $branchId)->value('quantity') ?? 0);
    }
}
