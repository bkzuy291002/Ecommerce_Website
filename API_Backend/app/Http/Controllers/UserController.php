<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected UserService $userService ){

    }

    public function getUser(int $request) : JsonResponse
    {
        try {
            $user = $this->userService->getUserById($request);

            if (!$user) {
                return $this->errorResponse(null, 'User not found', 404);
            }

            return $this->successResponse($user);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'An error occurred while fetching the user.', 500);
        }
    }

    public function getAllUser(): JsonResponse
    {
        try {
            $user = $this->userService->getAllUser();

            if (!$user) {
                return $this->errorResponse(null, 'User not found', 404);
            }

            return $this->successResponse($user);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'An error occurred while fetching the user.', 500);
        }
    }
}
