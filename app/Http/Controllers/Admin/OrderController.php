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
        
    public function index(Request $request)
    {
        $customer = $request->customer_id;
        $orders = $this->customerService->getOrders();
        return view('admin.order.index')
            ->with('orders', $orders);
    }
}
