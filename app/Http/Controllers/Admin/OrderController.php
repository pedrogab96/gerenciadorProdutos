<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct(OrderService $customerService)
    {
        $this->customerService = $customerService;
    }
        
    public function index()
    {
        $orders = $this->customerService->getOrders()->get();
        return view('admin.order.index')
            ->with('orders', $orders);
    }
}
