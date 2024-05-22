<?php
namespace  App\Services;

use App\Models\store;
use App\Repositories\Store\StoreReponsitory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;


interface StoreService
{
    public function getRepository() : StoreReponsitory;

    public function getStoreById(int $id): ?store;

    public function createStore(array $abttributes): ?store;

    public function getAllProduct(int $store_id): Collection;

}
