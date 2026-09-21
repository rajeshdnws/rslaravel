<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessBranchStock extends Model
{
    use HasFactory;

    protected $table = 'business_branch_stocks';

    protected $fillable = [
        'branch_id',
        'product_id',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(BusinessBranch::class, 'branch_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(BusinessProduct::class, 'product_id');
    }
}
