<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class products extends Model
{
    use HasFactory;

//    public function productImages(): HasMany
//    {
//        return $this->hasMany(ProductImage::class);
//    }

    protected $fillable = [
        'name',
        'store_id',
        'category_id',
        'sku',
        'slug',
        'price',
        'published',
        'quantity',
        'description',
        'warranty',
        'warranty_type',
        'discount',
        'city_id',
        'brand',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    public function product_variants(): HasMany
    {
        return $this->hasMany(product_variants::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(comments::class);
    }
}
