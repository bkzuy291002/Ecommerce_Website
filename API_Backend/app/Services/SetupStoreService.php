<?php
namespace App\Services;

use App\Models\setupStores;
use App\Repositories\SetupStore\SetupStoreRepository;

interface SetupStoreService
{
    public function getRepository() : SetupStoreRepository;

    public function createInformationStore(array $abttribute): setupStores;
}
