<?php

namespace App\Http\Controllers;

use App\Helper\ImageManagerTrait;
use App\Services\StoreService;
use App\Services\UserService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use APIResponseTrait, ImageManagerTrait;

    public function __construct(protected StoreService $storeService, protected UserService $userService)
    {
    }


    public function getInfostore(int $id): JsonResponse
    {
        try {
            $data = $this->storeService->getStoreById($id);
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }


//    public function edit(int $id): JsonResponse
//    {
//        try {
//            $data = $this->storeService->getStoreById($id);
//            return $this->successResponse(new StoreDetailResource($data), 'Successfully', 200);
//        } catch (\Exception $exception) {
//            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
//        }
//    }
//    public function update(UpdateStoreRequest $request, int $id): JsonResponse
//    {
//        try {
//            $params = $request->validated();
//            if ($file = $request->image) {
//                $fileData = $this->uploads($file);
//                $params['image'] = $fileData['path'];
//            }
//            $params['store_id'] = $id;
//            $this->storeService->updateStore($id, $params);
//            $this->userService->updateUser($params);
//            return $this->successResponse(null, 'Update Successfully', 200);
//        } catch (\Exception $exception) {
//            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
//        }
//    }
}
