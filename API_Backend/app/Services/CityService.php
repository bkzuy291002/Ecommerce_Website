<?php
namespace App\Services;

use Prettus\Repository\Contracts\RepositoryInterface;

interface CityService extends RepositoryInterface
{
    public function getLists();
}
