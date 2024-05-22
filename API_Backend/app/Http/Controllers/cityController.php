<?php
namespace App\Http\Controllers;
use App\Http\Resources\listCityResource;
use App\Service\city\serviceCity;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class cityController extends Controller
{
    use APIResponseTrait;
    
    public function __construct(protected serviceCity $serviceCity)
    {
    }
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $cities = $this->serviceCity->getAll();
            return $this->successResponse(listCityResource::collection($cities),'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 450);
        }

        // try {
        //     $data = $this->productService->getProductOutstanding();
        //     return $this->successResponse(listProductResource::collection($data), 'Successfully', 200);
        // } catch (\Exception $exception) {
        //     return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        // }
    }
}