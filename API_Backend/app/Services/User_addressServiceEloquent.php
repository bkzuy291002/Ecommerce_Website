<?php
namespace App\Services;

use App\Repositories\User_address\User_addressRepository;

class User_addressServiceEloquent implements User_addressService
{
    public function __construct(protected User_addressRepository $addressRepository)
    {

    }
    public function getRepository(): User_addressRepository
    {
        return $this->addressRepository;
    }

    public function createUserAddress(array $attribute)
    {
        return $this->addressRepository->create($attribute);
    }

    public function GetUserAddressByid(int $id)
    {
        return  $this->addressRepository
                ->where('id',$id)
                ->select('*')
                ->get();
    }

    public function GetIdAddressByUserid(int $user_id)
    {
        return  $this->addressRepository
        ->where('user_id', $user_id)
        ->select('id')
        ->get();
    }
}





















