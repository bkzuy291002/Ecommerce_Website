<?php
namespace App\Services;

use App\Models\product_variants;
use App\Repositories\product_variants\VariantRepository;
use Illuminate\Support\Collection;

interface VariantService
{
    public function getRepository(): VariantRepository;

    public function getProductVariantByid(int $id): Collection;

    public function createProductVariant($attribute): product_variants;

    public function storeVariant(int $id, array $attributes);

    public function deleteProductVariant(int $id);

    public function upsertProductVariant(array $attributes);

}
