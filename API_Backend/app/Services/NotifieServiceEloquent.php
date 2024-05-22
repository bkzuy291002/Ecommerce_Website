<?php
namespace App\Services;

use App\Repositories\Notifie\NotifieRepository;
use Illuminate\Support\Collection;

class NotifieServiceEloquent implements NotifieService
{
    public function __construct(protected NotifieRepository $notifieRepository)
    {

    }

    public function getRepository(): NotifieRepository
    {
        return $this->notifieRepository;
    }

    public function getAll(): Collection
    {
        return $this->notifieRepository->inRandomOrder()->limit(4)->get();
    }
}
