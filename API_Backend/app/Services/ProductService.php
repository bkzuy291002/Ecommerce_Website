<?php
namespace App\Services;

use App\Models\products;
use App\Repositories\Product\ProductRespository;
use Illuminate\Support\Collection;

interface ProductService
{
    public function getRepository(): ProductRespository;

    public function getProductOutstanding(): Collection;
    public function getProductSale(): Collection;
    public function getProductSuggest(): Collection;
    public function getAllProduct(int $published): Collection;

    public function createProduct(array $abttribute): products;

    public function getProductById(int $id);

    public function getProductById1(int $id);


    public function getProductByCategoriesId(int $id);

    public function getProducCarttById(int $id);


    public function getProductByslug(string $slug);

    public function getStoreByid(int $id);

    public function getImagebyid(int $id);

    public function getfullProduct();

    public function updatePublished(array $request);

    public function search(array $attributes): Collection;

    public function search1(array $attributes): Collection;


    public function updateProduct(int $id, array $attributes):mixed;

}
