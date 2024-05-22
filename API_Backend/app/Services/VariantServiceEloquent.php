<?php
namespace App\Services;

use App\Models\product_variants;
use App\Repositories\product_variants\VariantRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class VariantServiceEloquent implements VariantService
{
    public function __construct(protected VariantRepository $variantRepository)
    {

    }

    public function getRepository(): VariantRepository
    {
        return $this->variantRepository;
    }

    public function getProductVariantByid(int $id): Collection
    {
        return DB::table('products')
            ->where('products.id',$id)
            ->join('product_variants', 'products.id', '=', 'product_variants.products_id')
            ->select(
                'product_variants.color',
                'product_variants.price_variant',
                'product_variants.id'
            )
            ->get();
    }

    public function createProductVariant($attribute): product_variants
    {
        return $this->variantRepository->create($attribute);
    }

    public function storeVariant(int $id, array $attributes)
    {
        foreach($attributes['variants'] as $variant)
        {
            $newVariant = new product_variants();
            $newVariant->product_id = $id;
            $newVariant->color = $variant['color'];
            $newVariant->price_variant = $variant['price_variant'];
            $newVariant->save();
        }
    }

    public function deleteProductVariant(int $id)
    {
        return $this->variantRepository->delete($id);
    }

    public function upsertProductVariant(array $attributes)
    {
        return $this->variantRepository->upsert($attributes, ['id'], ['color', 'price']);
    }
}
