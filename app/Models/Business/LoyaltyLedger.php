<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoyaltyLedger extends Model
{
    use HasFactory;

    protected $table = 'business_loyalty_ledgers';

    protected $fillable = [
        'customer_id',
        'type',
        'points',
        'balance_after',
        'reference_type',
        'reference_id',
        'description',
    ];

    protected $casts = [
        'points' => 'integer',
        'balance_after' => 'integer',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(BusinessCustomer::class, 'customer_id');
    }
}
