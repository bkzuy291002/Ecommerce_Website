<?php
namespace App\Services;
use App\Models\Cart;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Collection;

interface CartService
{
    public function getRepository(): CartRepository;

    public function getCartbyId(int $id): Collection;

    public function addProductbyCart(array $abttribute):cart;

    public function deleteProductbyCart(string $sku);
}
