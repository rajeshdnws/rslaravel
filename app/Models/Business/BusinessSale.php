<?php

namespace App\Models\Business;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessSale extends Model
{
    use HasFactory;

    protected $table = 'business_sales';

    protected $fillable = [
        'invoice_number',
        'branch_id',
        'customer_id',
        'subtotal',
        'tax_amount',
        'discount_amount',
        'coupon_code',
        'loyalty_points_redeemed',
        'loyalty_discount_amount',
        'loyalty_points_earned',
        'grand_total',
        'payment_method',
        'payment_details',
        'status',
        'notes',
        'cashier_user_id',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'loyalty_points_redeemed' => 'integer',
        'loyalty_discount_amount' => 'decimal:2',
        'loyalty_points_earned' => 'integer',
        'grand_total' => 'decimal:2',
        'payment_details' => 'array',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(BusinessBranch::class, 'branch_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(BusinessCustomer::class, 'customer_id');
    }

    public function cashier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cashier_user_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(BusinessSaleItem::class, 'sale_id');
    }
}
