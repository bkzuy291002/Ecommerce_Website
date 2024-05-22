<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\listUserResource;
use App\Services\StoreService;
use App\Services\UserService;

use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use APIResponseTrait;
    public function __construct( protected StoreService $storeService , protected UserService $userService)
    {

    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
//            dd($request);
            $data = $this->storeService->createStore($request->validated());
            return $this->successResponse($data, 'Register successful', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getEmailBystoreid(Request $request): JsonResponse
    {
        try {
            $id = $request->input('store_id');
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $email = $this->userService->getEmailBystoreid($id);
            return $this->successResponse(['email' => $email]);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }
}
 