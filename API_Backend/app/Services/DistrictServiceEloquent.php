<?php
namespace App\Services;

use App\Models\district;
use App\Repositories\districts\DistrictRepository;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class DistrictServiceEloquent extends BaseRepository implements DistrictService
{
    protected DistrictRepository $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }


    public function model()
    {
        return district::class;
    }

    public function getRepository(): DistrictRepository
    {
        return $this->districtRepository;
    }
    public function getFull()
    {
//        return $this->districtRepository->query()
//            ->get();
    }

    public function set(string $name, string $value)
    {
        // TODO: Implement set() method.
    }

    public function clear(string $name)
    {
        // TODO: Implement clear() method.
    }

    public function getDistrictByCityId(int $id): Collection
    {
        return $this->districtRepository
            ->where('districts.city_id', $id)
            ->get();
    }
}
