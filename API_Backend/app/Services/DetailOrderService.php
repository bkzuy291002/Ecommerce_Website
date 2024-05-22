<?php
namespace App\Services;

use App\Repositories\DetailOrder\DetailOrderRepository;

interface DetailOrderService
{
    public function getRepository(): DetailOrderRepository;

    public function createDetailOrder(array $attribute);
}
