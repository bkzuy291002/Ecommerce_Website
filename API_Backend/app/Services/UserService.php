<?php
namespace App\Services;

use App\Models\Users;
use App\Repositories\User\UserReponsitory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

interface UserService
{
    public function getRepository(): UserReponsitory;
    public function getUserByid(int $id): ?Users;
    public  function createUser(array $abttribute): ?Users;

    public function login(array $abttribute);

    public function updateUserToken(array $abttribute);

    public function getEmailBystoreid(int $store_id): string;

    public function checkToken(string $token): ?Users;

    public function updateUserPassword(array $attribute);

    public function getAllUser(): Collection;
}
