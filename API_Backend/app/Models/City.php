<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $table = "cities";

    protected $fillable = [
        'id',
        'name',
        'created_at',
    ];

    public function district(): HasMany
    {
        return $this->hasMany(District::class);
    }
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(products::class);
    }
}
