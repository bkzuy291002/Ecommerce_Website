<?php
namespace App\Repositories\districts;

use App\Models\district;
use Prettus\Repository\Eloquent\BaseRepository;

class DistrictRepositoryEloquent extends  BaseRepository implements DistrictRepository
{
    public function model() : string
    {
        return district::class;
    }

}
