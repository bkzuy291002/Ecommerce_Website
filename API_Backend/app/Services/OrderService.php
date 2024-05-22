<?php
namespace App\Services;

use App\Models\Order;
use App\Repositories\Order\OrderRepository;

interface OrderService
{
    public function getRepository(): OrderRepository;

    public function createOrder(array $attributes): ?Order;
}
