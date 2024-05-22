<?php
namespace App\Repositories\DetailOrder;

use App\Models\Detail_order;
use Prettus\Repository\Eloquent\BaseRepository;

class DetailOrderRepositoryEloquent extends BaseRepository implements DetailOrderRepository
{

    public function Model()
    {
        return Detail_order::class;
    }
}
