<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class image extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'path',
        'size',
        'type',
        'product_id'
    ];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(products::class);
    }

}
