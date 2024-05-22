<?php
namespace App\Services;

use App\Repositories\districts\DistrictRepository;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Support\Collection;

interface DistrictService extends  RepositoryInterface
{
    public function getFull();

    public function getRepository(): DistrictRepository;

    public function getDistrictByCityId(int $id): Collection;
}
