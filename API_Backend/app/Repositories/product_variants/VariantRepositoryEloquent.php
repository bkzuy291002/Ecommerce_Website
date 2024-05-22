<?php
namespace App\Repositories\product_variants;

use App\Models\product_variants;
use Prettus\Repository\Eloquent\BaseRepository;

class VariantRepositoryEloquent extends BaseRepository implements VariantRepository
{

    public function Model(): string
    {
        return product_variants::class;
    }
}
