<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Detail_order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'price',
        'sku_id',
        'quantity',
        'store_id'
    ];

    public function order(): hasone
    {
        return $this->hasone(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(products::class);
    }

    public function sku(): BelongsTo
    {
        return $this->belongsTo(sku::class);
    }
}
