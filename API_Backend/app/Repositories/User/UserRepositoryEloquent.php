<?php
namespace App\Repositories\User;
use App\Models\Users;
use Prettus\Repository\Eloquent\BaseRepository;
class UserRepositoryEloquent extends BaseRepository implements UserReponsitory
{
    /**
     * @return string
     */
    public function Model(): string
    {
        return Users::class;
    }
}
