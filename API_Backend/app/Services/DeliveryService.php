<?php
namespace App\Services;

use App\Repositories\Delivery\DeliveryRepository;

interface DeliveryService
{
    public function getRepository(): DeliveryRepository;

    public function getAll();

    public function getCostById(int $id);
}
