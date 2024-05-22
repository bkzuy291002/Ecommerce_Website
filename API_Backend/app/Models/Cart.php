<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'sku',
        'quantity',
        'variant'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(products::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(users::class);
    }
}
