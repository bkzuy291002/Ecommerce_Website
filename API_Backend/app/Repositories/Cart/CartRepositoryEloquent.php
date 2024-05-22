<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CartRepositoryEloquent.
 *
 * @package namespace App\Repositories\Cart;
 */
class CartRepositoryEloquent extends BaseRepository implements CartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function Model()
    {
        return cart::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
//    public function boot()
//    {
//        $this->pushCriteria(app(RequestCriteria::class));
//    }

}
