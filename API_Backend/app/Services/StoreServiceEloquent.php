<?php
namespace App\Services;

use App\Models\store;
use App\Repositories\Store\StoreReponsitory;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class StoreServiceEloquent implements StoreService
{

    protected StoreReponsitory $storeRepository;

    public function __construct(StoreReponsitory $storeRepository)
    {
        $this->storeRepository = $storeRepository ;
    }

    public function getRepository(): StoreReponsitory
    {
        return $this->storeRepository;
    }

    public function getStoreById(int $id): ?store
    {
        return $this->storeRepository
            ->where('stores.id', $id)
            ->leftjoin('images', 'stores.id', '=', 'images.store_id')
            ->join('users', 'stores.id', '=', 'users.store_id')
            ->select(
                'stores.*',
                'images.path',
                'users.id as user_id'
            )
            ->first();
    }

    public function createStore(array $abttributes): ?store
    {
        return $this->storeRepository->create($abttributes);
    }

    public function getAllProduct(int $store_id): Collection
    {
        return $this->storeRepository
        ->where('stores.id', $store_id)
        ->rightjoin('products', 'stores.id', '=', 'products.store_id')
        ->select()
        ->get();
    }



}
