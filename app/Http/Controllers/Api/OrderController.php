<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getAllOrders()
    {
        $orders = $this->orderService->getAllOrders();
    }

    public function getOrderById($id)
    {
        $order = $this->orderService->getOrderById($id);
    }

    public function createOrder(Request $request)
    {
        $order = $this->orderService->createOrder($request);
    }
}
