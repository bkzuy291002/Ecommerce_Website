<?php
namespace App\Services\City;
use App\Repositories\City\CityRepository;
use App\Service\city\serviceCity;
use Illuminate\Support\Collection;

class CityServiceEloquents implements serviceCity
{
    protected CityRepository $cityRepository;
    public function __construct(CityRepository $cityRepository)
    {
        return $this->cityRepository = $cityRepository;
    }
    public function getRepository(): CityRepository
    {
        return $this->cityRepository;
    }
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->cityRepository->all();
    }
}
