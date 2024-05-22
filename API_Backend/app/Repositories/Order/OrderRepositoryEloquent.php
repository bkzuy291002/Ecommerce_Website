<?php
namespace App\Repositories\Order;

use App\Models\Order;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{

    public function Model()
    {
        return Order::class;
    }
}
