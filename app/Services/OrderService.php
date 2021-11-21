<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function getAll()
    {
        return Order::all();
    }

    public function create(array $data)
    {
        return Order::create($data);
    }
}
