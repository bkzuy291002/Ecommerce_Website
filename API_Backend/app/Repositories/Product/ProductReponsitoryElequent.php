<?php
namespace App\Repositories\Product;

use App\Models\products;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductReponsitoryElequent extends BaseRepository implements ProductRespository
{

    public function Model(): string
    {
        return products::class;
    }
}
