<?php
namespace App\Services;

use App\Models\setupStores;
use App\Repositories\SetupStore\SetupStoreRepository;

class SetupStoreServiceEloquent implements SetupStoreService
{
    public function __construct(protected SetupStoreRepository $setupStoreRepository)
    {
    }

    public function getRepository(): SetupStoreRepository
    {
        return $this->setupStoreRepository;
    }

    public function createInformationStore(array $abttribute): setupStores
    {
        return $this->setupStoreRepository->create($abttribute);
    }
}
