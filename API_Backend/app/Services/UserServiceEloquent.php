<?php
namespace App\Services;

use App\Models\Users;
use App\Repositories\User\UserReponsitory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class UserServiceEloquent implements UserService
{
    public function __construct(protected UserReponsitory $userRepository)
    {
    }
    public function getRepository(): UserReponsitory
    {
        return $this->userRepository;
    }
    public function getUserByid(int $id): ?Users
    {
        return $this->userRepository
            ->where('users.id', $id)
            ->leftJoin('stores', 'users.store_id', '=', 'stores.id')
            ->select(
                'users.email',
                'users.phone',
                'users.gender',
                'users.password',
                'stores.name as nameStore',
//                'stores.city_id ad city',
//                'stores.district_id as district',
                'stores.address as address'
            )->first();
    }

    public function createUser(array $abttribute): ?\App\Models\Users
    {
        return $this->userRepository->create($abttribute);
    }

    public function login(array $abttribute): ?Authenticatable
    {
//        Auth::attempt($abttribute);
        if (Auth::attempt($abttribute)) {
            return Auth::user();
        }
        return null;
    }

    public function updateUserToken(array $abttribute)
    {
        return $this->userRepository
            ->where('users.email', $abttribute['email'])
            ->update(['token' => $abttribute['token']]);
    }

    public function checkToken(string $token): ?Users
    {
        return $this->userRepository->where('users.token', $token)->first();
    }

    public function updateUserPassword(array $attribute)
    {
        return $this->userRepository
            ->where('users.token', $attribute['token'])
            ->update([
                'token' => null,
                'password' => bcrypt($attribute['password'])
            ]);
    }

    public function getEmailBystoreid(int $store_id): string
    {
        return $this->userRepository
            ->where('store_id', $store_id)
            ->value('email');
    }

    public function getAllUser(): Collection 
    {
        return $this->userRepository
        ->leftJoin('stores', 'users.store_id', '=', 'stores.id')
        ->select(
            'users.id',
            'users.email',
            'users.phone',
            'users.gender',
            'stores.name as nameStore',
            'stores.address as address'
        )->get();
    }

}
