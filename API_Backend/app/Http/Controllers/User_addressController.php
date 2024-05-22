<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Services\User_addressService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\Request;

class User_addressController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected User_addressService $useraddressService ){

    }

    public function addAddress(UserAddressRequest $request)
    {
        try {
            if (!$request) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $product = $this->useraddressService->createUserAddress($request->validated());
            return $this->successResponse($product);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function GetUserAddressByid(int $id)
    {
        try {
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $data = $this->useraddressService->GetUserAddressByid($id);
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }

    public function GetIdAddressByUserid(int $user_id)
    {
        try {
            if (!$user_id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $data = $this->useraddressService->GetIdAddressByUserid($user_id);
            return $this->successResponse($data, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }
}
