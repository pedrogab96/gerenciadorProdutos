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

    /**
     * Show all orders.
     * @group Order
     * @bodyParam customer int required Customer id
     * @responseFile storage/responses/order/index.json
     */

    public function index(Request $request)
    {
        $request->validate([
            'customer' => 'required|exists:customers,id',
        ]);

        $orders = $this->orderService->getOrders()->paginate();
        return response()->json($orders);
    }

    /**
     * Show a order
     * @group Order
     * @bodyParam customer int required Customer id
    */

    public function show(Request $request, $order_id)
    {
        $request->validate([
            'customer' => 'required|exists:customers,id',
        ]);

        $order = $this->orderService->show($order_id);
        return response()->json($order);
    }

    /**
     * Create a new order.
     * @group Order
     * @bodyParam customer int required Customer id.
     * @bodyParam products array required Products.
     * @bodyParam status string required Status.
     * @bodyParam products[].id int required Product id.
     * @responseFile storage/responses/order/create.json
    */

    public function create(OrderRequest $request)
    {
        $request->validated();
        $data = $request->except('_token', '_method');
        $this->orderService->create($data);
        return response()->json(['message' => 'Order created successfully'], 200);
    }

    /**
     * Update an order.
     * it is necessary that the user is the owner of the order
     * @group Order
     * @bodyParam customer int required Customer id.
     * @bodyParam products array required Products.
     * @bodyParam products[].id int required Product id.
     * @responseFile storage/responses/order/update.json
     */

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

    /**
     * Delete an order.
     * it is necessary that the user is the owner of the order
     * @group Order
     * @bodyParam customer int required Customer id.
     * @reponseFile storage/responses/order/delete.json
     */

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
