<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getOrders();
        return response()->json($orders);
    }

    public function show($order_id)
    {
        $order = $this->orderService->show($order_id);
        return response()->json($order);
    }

    public function create(OrderRequest $request)
    {
        $request->validated();
        $data = $request->except('_token', '_method');
        $this->orderService->create($data);
        return response()->json(['message' => 'Order created successfully'], 200);
    }

    public function update(OrderRequest $request, $order_id)
    {
        $data = $request->except('_token', '_method');
        $this->orderService->update($data, $order_id);
        return response()->json(['message' => 'Order updated successfully'], 200);
    }

    public function delete($order_id)
    {
        $this->orderService->delete($order_id);
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
