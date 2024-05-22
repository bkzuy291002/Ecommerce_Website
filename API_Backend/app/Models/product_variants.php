<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_variants extends Model
{
    use HasFactory;
    protected $fillable = [
        'products_id',
        'color',
        'price_variant'
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(products::class);
    }
}
