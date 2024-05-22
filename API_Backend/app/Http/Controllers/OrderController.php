<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\DetailOrderService;
use App\Services\OrderService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected OrderService $orderService,
                                protected DetailOrderService $detailOrderService)
    {
    }

    private function DetailOrder(Order $order, mixed $request): void
    {
        $attributes['order_id'] = $order->id;
        // dd($request);
        if ($request->details) {
            foreach ($request->details as $detail) {
            //    dd($request->details);
                $attributes['product_id'] = $detail['product_id'];
                $attributes['sku_id'] = $detail['sku_id'];
                $attributes['quantity'] = $detail['quantity'];
                $attributes['store_id'] = $detail['store_id'];
                $attributes['price'] = $detail['price'];
                $this->detailOrderService->createDetailOrder($attributes);
            }
        }
    }

    public function CreateOrder(OrderRequest $request): JsonResponse
    {
        try{
            DB::beginTransaction();
            $params = $request->validated();
            $params['user_id'] = Auth::user()->id;
            $data = $this->orderService->createOrder($params);
            // dd($data);
            if($data) {
                $this->DetailOrder($data, $request);
            }
            DB::commit();
            return $this->successResponse($data, 'Successfully', 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
