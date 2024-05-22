<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'user_address_id',
        'delivery_id',
        'payment_status',
        'amount',
        'transport_fee',
        'time_order',
        'transition_id',
        'note'
    ];

    public function userAddress():hasOne
    {
        return $this->hasOne(User_address::class);
    }

    public function user():hasOne
    {
        return $this->hasOne(User::class);
    }

    public function deliveries():hasOne
    {
        return $this->hasOne(Delivery::class);
    }

    public function Detailorder(): BelongsTo
    {
        return $this->belongsTo(Detail_order::class);
    }
}
