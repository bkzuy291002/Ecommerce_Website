<?php

namespace App\Http\Controllers;

use App\Services\DeliveryService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected DeliveryService $deliveryService ){

    }

    public function getAll(): JsonResponse
    {
        try {
            $delivery = $this->deliveryService->getAll();
            return $this->successResponse($delivery,'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 450);
        }
    }

    public function getCostById(int $id): JsonResponse
    {
        try {
            $cost = $this->deliveryService->getCostById($id);
            return $this->successResponse($cost,'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 450);
        }
    }
}
