<?php
namespace App\Repositories\User_address;

use App\Models\User_address;
use Prettus\Repository\Eloquent\BaseRepository;

class User_addressRepositoryEloquent extends BaseRepository implements User_addressRepository
{

    public function Model()
    {
        return User_address::class;
    }
}
