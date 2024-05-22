<?php

namespace App\Http\Controllers;

use App\Http\Resources\listproduct_variantResource;
use App\Services\VariantService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected VariantService $variantService)
    {
    }

    public function getProductVariantByid(int $id): JsonResponse
    {
//        try {
//            $data = $this->variantService->getProductVariantByid($id);
//            return $this->successResponse(listproduct_variantResource::collection($data), 'Successfully', 200);
//        } catch (\Exception $exception) {
//            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
//        }

        try {
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->variantService->getProductVariantByid($id);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }
}
