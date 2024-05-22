<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class comments extends Model
{
    use HasFactory;

//    public function comment_images(): HasMany
//    {
//        return $this->hasMany(CommentImage::class);
//    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(products::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
