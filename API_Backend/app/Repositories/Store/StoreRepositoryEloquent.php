<?php
namespace App\Repositories\Store;

use App\Models\store;
use Prettus\Repository\Eloquent\BaseRepository;

class StoreRepositoryEloquent extends BaseRepository implements StoreReponsitory
{
    public function Model(): string
    {
        return store::class;
    }

}

