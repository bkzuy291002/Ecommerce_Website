<?php
namespace App\Services;

use App\Models\City;
use App\Repositories\city\CityRepository;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class CityServiceEloquent extends BaseRepository implements CityService
{
    protected CityRepository $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function model(): string
    {
        return City::class;
    }

    public function getLists(): Collection
    {
        return $this->cityRepository->get();
    }
}
