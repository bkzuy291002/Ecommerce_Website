<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SetupStoreRequest;
use App\Http\Requests\updatePublishedRequest;
use App\Http\Resources\listProductResource;
use App\Http\Resources\ProductEditResource;
use App\Http\Resources\ProductListResource;
use App\Models\products;
use App\Services\ImageService;
use App\Services\ProductService;
use App\Services\SetupStoreService;
use App\Services\StoreService;
use App\Services\VariantService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helper\ImageManagerTrait;


class ProductController extends Controller
{
    use APIResponseTrait, ImageManagerTrait;

    public function __construct(protected ProductService    $productService ,
                                protected VariantService    $variantService ,
                                protected StoreService      $storeService ,
                                protected SetupStoreService $setupStoreService,
                                protected ImageService      $imageService)
    {
    }

    public function ProductOutstanding(): JsonResponse
    {
        try {
            $data = $this->productService->getProductOutstanding();
            return $this->successResponse(listProductResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function ProductSale(): JsonResponse
    {
        try {
            $data = $this->productService->getProductSale();
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function ProductSuggest(): JsonResponse
    {
        try {
            $data = $this->productService->getProductSuggest();
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getProductbyslug(string $slug): JsonResponse
    {
        try {
            // $slug = $request->input('slug');
            if (!$slug) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->productService->getProductByslug($slug);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function getProductbyid(int $id): JsonResponse
    {
        try {
            // $slug = $request->input('slug');
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->productService->getProductById($id);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function getProducCarttbyid(int $id): JsonResponse
    {
        try {
            // $slug = $request->input('slug');
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->productService->getProducCarttById($id);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }

    }


    public function getImagebyid(int $id): JsonResponse
    {
        try {
            // $slug = $request->input('slug');
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->productService->getImagebyid($id);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function getStoreByid(int $id): JsonResponse
    {
        try {
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->productService->getStoreByid($id);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }



    public function getfullProduct(): JsonResponse
    {

        try {
            $data = $this->productService->getfullProduct();
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function Allproduct(int $id): JsonResponse
    {
        try {
            // $id = $request->input('publised');
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $data = $this->storeService->getAllProduct($id);
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function updatePublished(updatePublishedRequest $request): JsonResponse
    {
        try {
            $result = $this->productService->updatePublished($request->all());
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            return $this->successResponse($result, 'Reset Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }

    private function storeVariant(products $product, mixed $request): void
    {
        $attributes['products_id'] = $product->id;
        if ($request->variants) {
            foreach ($request->variants as $variant) {
                $attributes['color'] = $variant['color'];
                $attributes['price_variant'] = $variant['price_variant'];
                $this->variantService->createProductVariant($attributes);
            }
        }
    }

    private function execute(mixed $request): mixed
    {
        $params = $request->validated();
//        $params['slug'] = Str::slug($params['slug']);
        if ($file = $request->file('images')) {
            $uploadedImages = [];
            foreach($file as $image){
                $fileData = $this->uploads($image);
                $uploadedImages[] = $fileData['path'];

            }
            $params['images'] = $uploadedImages;
        }
        return $params;
    }

    public function setupStore(SetupStoreRequest $request): JsonResponse
    {

        try{
            DB::beginTransaction();
            $params = $this->execute($request);
            $params['store_id'] = Auth::user()->store_id;
            $data = $this->setupStoreService->createInformationStore($params);
            if($data) {
                $this->imageService->storeImage($params['images'],$data->id);
            }
            DB::commit();
            return $this->successResponse(null, 'Successfully', 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function createProduct(ProductRequest $request): JsonResponse
    {
        try{
            DB::beginTransaction();
            $params = $this->execute($request);
            $params['slug'] = Str::slug($params['slug']);
            $params['published'] = 1;
            $params['store_id'] = Auth::user()->store_id;
            $data = $this->productService->createProduct($params);
            if($data) {
                $this->imageService->productImage($params['images'],$data->id);
                $this->storeVariant($data, $request);
            }
            DB::commit();
            return $this->successResponse(null, 'Successfully', 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function drafcreateProduct(ProductRequest $request): JsonResponse
    {
        try{
            DB::beginTransaction();
            $params = $this->execute($request);
            $params['slug'] = Str::slug($params['slug']);
            $params['published'] = 3;
            $params['store_id'] = Auth::user()->store_id;
            $data = $this->productService->createProduct($params);
            if($data) {
                $this->imageService->storeImage($params['images'],$data->id);
                $this->storeVariant($data, $request);
            }
            DB::commit();
            return $this->successResponse(null, 'Successfully', 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function publishUpdate(EditProductRequest $request, int $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $params = $this->execute($request);
            $product = $this->productService->getProductById($id);
            $this->handleImage($product, $params['currentImages'], $params['images']);
            $this->handleVariants($request);
            if ($product->published == 3) {
                $params['published'] = 1;
                $this->productService->updateProduct($id, $params);
                DB::commit();
                return $this->successResponse(null, 'Successfully', 200);
            }
            if ($product->published == 1 || $product->published == 2) {
                $params['draft'] = null;
                $params['published'] = 1;
                $this->productService->updateProduct($id, $params);
                DB::commit();
                return $this->successResponse(null, 'Successfully', 200);
            }
            DB::commit();
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function handleImage(products $product, mixed $images, mixed $newImage): void {
        $images = array_filter($images);
        $newImage = array_filter($newImage);

        $deleteImage = array_diff($images , $newImage);
        foreach ($deleteImage as $image) {
            $product->images()->detach($image['id']);
        }

        $addImage = array_diff($newImage , $images);
        foreach ($addImage as $image) {
            $product->images()->attach($image['id']);
        }
    }

    private function handleVariants(mixed $request): void
    {
        if ($request->deleteVariants) {
            foreach ($request->deleteVariants as $variant) {
                $this->variantService->deleteProductVariant($variant['id']);
            }
        }
        $this->variantService->upsertProductVariant(array_filter($request->variants));
    }

    public function compareImage(int $id):JsonResponse
    {
        try {
            DB::beginTransaction();
//            $params = $this->execute($request);
              $params = $this->imageService->getImageById($id);
//              $params1 = $params['id'];

//              $product = $this->productService->getProductById($id);

//            $this->handleImage($product, $params['currentImages'], $params['images']);
            DB::commit();
            return $this->successResponse($params, 'Successfully', 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function search(SearchRequest $request): JsonResponse
    {
        try {
            $params = $request->validated();
            $data = $this->productService->search1($params);
            // return $this->successResponse(ProductListResource::collection($data));
            return $this->successResponse($data);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getProductByCategoriesId(int $id): JsonResponse
    {
        try {
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $data = $this->productService->getProductByCategoriesId($id);
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function edit(int $id): JsonResponse
    {
        try {
            $product = $this->productService->getProductById1($id);
//            if ($product['draft']) {
//                return $this->successResponse(json_decode($product['draft']), 'Successfully', 200);
//            }
            return $this->successResponse($product, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

}
