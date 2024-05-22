<?php
namespace App\Service\city;

use App\Repositories\City\CityRepository;
use Illuminate\Support\Collection;

interface serviceCity
{
    /**
     * @return CityRepository
     */
    
    public function getRepository(): CityRepository;
    public function getAll(): Collection;
}