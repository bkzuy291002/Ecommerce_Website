<?php
namespace App\Repositories\SetupStore;

use App\Models\setupStores;
use Prettus\Repository\Eloquent\BaseRepository;

class SetupStoreRepositoryEloquent extends BaseRepository implements SetupStoreRepository
{

    public function Model(): string
     {
        return setupStores::class;
    }
}
