<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessCustomer extends Model
{
    use HasFactory;

    protected $table = 'business_customers';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'tier',
        'wallet_balance_points',
        'total_spend',
        'notes',
    ];

    protected $casts = [
        'wallet_balance_points' => 'integer',
        'total_spend' => 'decimal:2',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(BusinessSale::class, 'customer_id');
    }

    public function loyaltyLedgers(): HasMany
    {
        return $this->hasMany(LoyaltyLedger::class, 'customer_id');
    }
}
