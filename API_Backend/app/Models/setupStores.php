<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setupStores extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'gender',
        'name_store',
        'address_store',
        'city_id',
        'district_id',
        'image'
    ];


}
