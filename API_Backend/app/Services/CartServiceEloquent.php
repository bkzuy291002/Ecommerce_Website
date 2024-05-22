<?php
namespace App\Services;

use App\Models\Cart;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Collection;

class CartServiceEloquent implements CartService
{
    public function __construct(protected CartRepository $cartRepository)
    {

    }
    public function getRepository(): CartRepository
    {
        return $this->cartRepository;
    }

    public function getCartbyId(int $id): Collection
    {
        return $this->cartRepository
            ->where('user_id',$id)
            ->select(
//                'sku',
//                'product_id'
                'carts.*'
            )
            ->get();
    }

    public function addProductbyCart(array $abttribute):cart
    {
        $existingProduct = $this->cartRepository
            ->where('product_id', $abttribute['product_id'])
            ->where('variant', $abttribute['variant'])
            ->first();
        if ($existingProduct) {
            $existingProduct->quantity += $abttribute['quantity'];
            $existingProduct->save();

            return $existingProduct;
        }

        return $this->cartRepository->create($abttribute);
    }


    public function deleteProductbyCart(string $sku)
    {
        return $this->cartRepository->deleteWhere([
            'sku'=>$sku,
        ]);
    }
}
