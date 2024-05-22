<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class district extends Model
{
    protected $table = "districts";

    protected $fillable = [
        'id',
        'name',
        'city_id',
        'created_at',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }
}
