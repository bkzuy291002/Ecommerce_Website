<?php
namespace App\Services;

use App\Repositories\User_address\User_addressRepository;

interface User_addressService
{
    public function getRepository(): User_addressRepository;

    public function createUserAddress(array $attribute);

    public function GetUserAddressByid(int $id);
    
    public function GetIdAddressByUserid(int $user_id);

}
