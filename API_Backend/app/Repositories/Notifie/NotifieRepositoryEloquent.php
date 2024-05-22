<?php
namespace App\Repositories\Notifie;

use App\Models\notifies;
use Prettus\Repository\Eloquent\BaseRepository;

class NotifieRepositoryEloquent extends BaseRepository implements NotifieRepository
{

    public function Model(): string
    {
        return notifies::class;
    }
}
