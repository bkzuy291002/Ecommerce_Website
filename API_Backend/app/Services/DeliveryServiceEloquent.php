<?php
namespace App\Services;

use App\Repositories\Delivery\DeliveryRepository;
use http\Env\Request;

class DeliveryServiceEloquent implements DeliveryService
{
    public function __construct(protected DeliveryRepository $deliveryRepository)
    {

    }

    public function getRepository(): DeliveryRepository
    {
        return $this->deliveryRepository;
    }

    public function getAll()
    {
        return $this->deliveryRepository->all();
    }

    public function getCostById(int $id)
    {
        return $this->deliveryRepository
               ->where('id',$id)
               ->select(
                'cost'
               )
               ->get();
    }
}
