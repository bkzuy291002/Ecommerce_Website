<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupStoreRequest;
use App\Services\SetupStoreService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SetupStoreController extends Controller
{
    use APIResponseTrait;

    public function __construct( protected SetupStoreService $setupStoreService)
    {

    }

    public function informationStore(SetupStoreRequest $request):JsonResponse
    {
        try {
            $data = $this->setupStoreService->createInformationStore($request->validated());
            return $this->successResponse($data, 'Register successful', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }


}
