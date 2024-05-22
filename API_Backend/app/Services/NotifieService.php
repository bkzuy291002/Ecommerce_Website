<?php
namespace App\Services;

use App\Repositories\Notifie\NotifieRepository;
use Illuminate\Support\Collection;

interface NotifieService
{
    public function getRepository(): NotifieRepository;

    public function getAll(): Collection;
}
