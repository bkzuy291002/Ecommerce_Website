<?php
namespace App\Repositories\Delivery;

use App\Models\Delivery;
use Prettus\Repository\Eloquent\BaseRepository;

class DeliveryRepositoryEloquent extends BaseRepository implements DeliveryRepository
{

    public function Model()
    {
        return Delivery::class;
    }
}
