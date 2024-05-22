<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class store extends Model
{
    use HasFactory;
    protected $table = "stores";

    protected $fillable = [
        'name',
        'city_id',
        'district_id',
        'address',
    ];
    public function user(): HasOne
    {
        return $this->hasOne(Users::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(products::class);
    }
}
