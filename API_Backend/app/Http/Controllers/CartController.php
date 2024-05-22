<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Services\CartService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected CartService $cartService ){

    }

    public function getCartbyId(int $id)
    {
        try {
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->cartService->getCartbyId($id);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }


    public function addProductbyCart(CartRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $params = $request->validated();
            $params['user_id'] = Auth::user()->id;
            $data = $this->cartService->addProductbyCart($params);
            DB::commit();
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function detroy(string $sku)
    {
        try {
            if (!$sku) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->cartService->deleteProductbyCart($sku);
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }
}
