<?php

namespace App\Http\Controllers;

use App\Http\Resources\listCityResource;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Services\CityService;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    use APIResponseTrait;
    public function __construct(protected CityService $cityService)
    {

    }
    public function index(): JsonResponse
    {
        try {
            $cities = $this->cityService->getLists();
            return $this->successResponse(listCityResource::collection($cities),'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
