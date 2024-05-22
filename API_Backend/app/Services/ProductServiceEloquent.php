<?php
namespace App\Services;

use App\Models\products;
use App\Repositories\Product\ProductRespository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductServiceEloquent implements ProductService
{
    public function __construct(protected ProductRespository $productRepository)
    {
    }


    public function getRepository(): ProductRespository
    {
        return $this->productRepository;
    }

    public function updateProduct(int $id, array $attributes): mixed
    {
        return $this->productRepository->update($attributes, $id);
    }

    public function getProductOutstanding(): Collection
    {
        return $this->productRepository
            ->where('published', 1)
            ->where('special', true)
            ->limit(8)
            ->select(
                'id',
                'name',
                'price',
                'discount',
                'discount_type'
            )
            ->get();
    }

    public function getProductSale(): Collection
    {

        return DB::table('products')
        ->join('images', 'products.id', '=', 'images.product_id')
        ->whereNotNull('products.discount')
            ->limit(8)
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'slug',
            'products.discount',
            'products.discount_type',
            'images.path'
        )
        ->get();
    }

    public function getProductSuggest(): Collection
    {
        // return $this->productRepository
        //     ->where('published', 1)
        //     ->inRandomOrder()
        //     ->limit(8)
        //     ->select(
        //         'id',
        //         'name',
        //         'price',
        //         'discount',
        //         'discount_type'
        //     )
        //     ->get();

        return DB::table('products')
        ->join('images', 'products.id', '=', 'images.product_id')
        ->inRandomOrder()
        ->limit(8)
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'products.discount',
            'slug',
            'products.discount_type',
            'images.path'
        )
        ->get();

    }

    public function getAllProduct(int $published): Collection
    {
        return $this->productRepository
            ->where('published', $published)
            ->limit(10)
            ->select(
                'id',
                'name',
                'price',
                'quantity',
                'type',
                'slug',
                'published'
            )
            ->get();
    }
    public function createProduct(array $abttribute): products
    {
        return $this->productRepository->create($abttribute);
    }

    public function getProductById(int $id)
    {
        return $this->productRepository
            ->where('id', $id)
            ->select(
                'products.id',
                'products.store_id',
                'products.category_id',
                'products.name',
                'products.price',
                'products.discount',
                'products.discount_type',
                'products.quantity',
                'products.description',
                'products.brand',
                'products.warranty',
                'products.warranty_type',
                'products.city_id',
            )
            ->get();
    }

    public function getProductById1(int $id)
    {
        return $this->productRepository->find($id);
    }

    public function getProductByslug(string $slug)
    {
        return $this->productRepository
        ->where('slug', $slug)
        ->select(
            'products.id',
            'products.store_id',
            'products.category_id',
            'products.name',
            'products.price',
            'products.discount',
            'products.discount_type',
            'products.quantity',
            'products.description',
            'products.brand',
            'products.warranty',
            'products.warranty_type',
            'products.city_id',
        )
        ->get();
    }

    public function getImagebyid(int $id) {
        return $this->productRepository
            ->join('images', 'products.id', '=', 'images.product_id')
            ->where('products.id', $id)
            ->select('images.path')
            ->get();
    }


    public function getStoreByid(int $id)
    {
        return $this->productRepository
            ->where('products.store_id', $id)
            ->join('stores', 'products.store_id', '=', 'stores.id')
//            ->join('images', 'stores.id', '=', 'images.store_id')
            ->select(
                'stores.name',
//                'images.path'
            )
            ->first();
    }

    public function getfullProduct() {
        return $this->productRepository->all();
    }

    public function updatePublished(array $request) {
        return $this->productRepository
        ->where('products.id', $request['id'])
        ->update([
            'published' => $request['published'],
        ]);
    }


    public function search(array $attributes): Collection {
        $productQuery = $this->productRepository
        ->where('products.name', 'like', '%' . $attributes['keyword'] . '%')
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'slug',
            'products.discount',
            'products.discount_type'
        );

        // Lấy danh sách path của hình ảnh từ bảng images
        $imagePaths = DB::table('images')
        ->select('product_id', 'path','id')
        ->get()
        ->groupBy('product_id');
        // Lấy kết quả của câu truy vấn sản phẩm
        $result = $productQuery->get();

        // Gắn danh sách path vào kết quả
        foreach ($result as $product) {
            $productId = $product->id;
            $product->image_paths = isset($imagePaths[$productId]) ? $imagePaths[$productId]->pluck('path','id')->toArray() : []; // Lấy danh sách path hình ảnh cho sản phẩm
        }


        return $result;
    }

    public function search1(array $attributes): Collection 
    {
        return $this->productRepository
        ->where('products.name', 'like', '%' . $attributes['keyword'] . '%')
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'products.slug',
            'products.discount',
            'products.discount_type'
        )
        ->addSelect(['image_path' => function($query) {
            $query->select('images.path')
                ->from('images')
                ->whereColumn('images.product_id', 'products.id')
                ->orderBy('images.created_at')
                ->limit(1);
        }])
        ->get();

    }

    public function getProducCarttById(int $id){
        return $this->productRepository
        ->where('products.id', $id)
        ->join('images', 'products.id', '=', 'images.product_id')
        ->select(
            'products.id',
            'products.store_id',
            'products.category_id',
            'products.name',
            'products.price',
            'products.discount',
            'products.discount_type',
            'products.quantity',
            'products.description',
            'products.brand',
            'products.warranty',
            'products.warranty_type',
            'products.city_id',
            'images.path'
        )
        ->first();
    }

    // public function getProductByCategoriesId(int $id)
    // {
    //     $productIds = $this->productRepository->where('category_id', $id)->pluck('id');

    //     $data = [];

    //     foreach ($productIds as $productId) {
    //         $productData = DB::table('products')
    //             ->where('id', $productId)
    //             ->join('images', 'products.id', '=', 'images.product_id')
    //             ->select(
    //                 'products.id',
    //                 'products.name',
    //                 'products.price',
    //                 'products.discount',
    //                 'products.slug',
    //                 'products.discount_type',
    //                 'images.path'
    //             )
    //             ->get();

    //         $data[] = $productData;
    //     }

    //     return $data;
    // }

    public function getProductByCategoriesId(int $id)
    {
        $data = DB::table('products')
        ->where('category_id', $id)
        ->join('images', 'products.id', '=', 'images.product_id')
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'products.discount',
            'products.slug',
            'products.discount_type',
            DB::raw('MIN(images.path) as path')
        )
        ->groupBy('products.id', 'products.name', 'products.price', 'products.discount', 'products.slug', 'products.discount_type')
        ->get();

        return $data;
    }



}
