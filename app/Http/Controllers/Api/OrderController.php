<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $request->validate([
            'customer' => 'required|exists:customers,id',
        ]);

        $orders = $this->orderService->getOrders()->paginate();
        return response()->json($orders);
    }

    public function show(Request $request, $order_id)
    {
        $request->validate([
            'customer' => 'required|exists:customers,id',
        ]);

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
        $request->validated();
        $data = $request->except('_token', '_method');
        $orderExists = $this->orderService->getOrder($order_id) ?? false;
        $owner = $orderExists->customer_id ?? false;

        if ($orderExists && $owner == $request->customer) {
            $this->orderService->update($data, $order_id);
            return response()->json(['message' => 'Order updated successfully'], 200);
        }
        return response()->json(['message' => 'it was not possible to update the order'], 404);
    }

    public function delete(Request $request, $order_id)
    {
        $request->validate([
            'customer' => 'required|exists:customers,id',
        ]);

        $orderExists = $this->orderService->getOrder($order_id) ?? false;
        $owner = $orderExists->customer_id ?? false;

        if ($orderExists && $owner == $request->customer) {
            $this->orderService->delete($order_id);
            return response()->json(['message' => 'Order deleted successfully'], 200);
        }
        return response()->json(['message' => 'You are not owner of this order'], 403);
    }
}
