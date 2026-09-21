<?php

namespace App\Models\Business;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockTransfer extends Model
{
    use HasFactory;

    protected $table = 'business_stock_transfers';

    protected $fillable = [
        'transfer_number',
        'source_branch_id',
        'destination_branch_id',
        'status',
        'dispatched_at',
        'received_at',
        'notes',
        'dispatched_by_user_id',
        'received_by_user_id',
    ];

    protected $casts = [
        'dispatched_at' => 'datetime',
        'received_at' => 'datetime',
    ];

    public function sourceBranch(): BelongsTo
    {
        return $this->belongsTo(BusinessBranch::class, 'source_branch_id');
    }

    public function destinationBranch(): BelongsTo
    {
        return $this->belongsTo(BusinessBranch::class, 'destination_branch_id');
    }

    public function dispatchedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dispatched_by_user_id');
    }

    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by_user_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(StockTransferItem::class, 'transfer_id');
    }
}
