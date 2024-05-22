<?php

namespace App\Http\Controllers;

use App\Helper\SendMailTrait;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\StoreService;
use App\Services\UserService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    use APIResponseTrait , SendMailTrait;
    public function __construct( protected StoreService $storeService, protected UserService $userService )
    {

    }

    public function login(LoginRequest $request) : JsonResponse
    {
        try {
            $user = $this->userService->login($request->validated());
            if(!$user){
                return $this->errorResponse(null, 'Data not found', 404);
            }

            $params['id'] = $user->id;
            $params['store_id'] = $user->store_id;
            $params['token'] = $user->createToken('authToken')->plainTextToken;

            return $this->successResponse($params, 'Successful', 200);
        }
        catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        try {
            // check user
            $params = $request->validated();
            // generate token
            $params['token'] = Str::random(64);
            $result = $this->userService->updateUserToken($params);
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            //send mail
            $this->callSendForgotPassword([
                'email' => $params['email'],
                'token' => $params['token']
            ]);
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }

    public function checkExistToken(Request $request): JsonResponse
    {
        try {
            $user = $this->userService->checkToken($request->get('token'));
            if (!$user) {
                return $this->errorResponse(null, 'Token invalid', 404);
            }
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        try {
            $params = $request->validated();
            $params['token'] = $request->get('token');
            $result = $this->userService->updateUserPassword($params);
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            return $this->successResponse(null, 'Reset Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }

}
