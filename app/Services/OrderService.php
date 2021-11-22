<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function getOrders()
    {
        $order = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.*', 'customers.name as customer_name')
            ->get();
        return $order;
    }

    public function show($order_id)
    {
        $order = Order::find($order_id);
        $order->products = $order->products()->get();
        return $order;
    }

    public function create($params)
    {
        $productIds = collect($params['products'])->pluck('id')->toArray();
        $order = new Order();
        $order->customer_id = $params['customer_id'];
        $order->status = $params['status'] ?? 'pending';
        $order->save();
        $order->products()->attach($productIds);
        $total_price = $order->products()->sum('price');
        $order->total_price = $total_price;
        $order->save();
    }

    public function update($params, $order_id)
    {
        $productIds = collect($params['products'])->pluck('id')->toArray();
        $order = Order::find($order_id);
        $order->status = $params['status'];
        $order->save();
        $order->products()->sync($productIds);
    }

    public function delete($order_id)
    {
        $order = Order::find($order_id);
        $order->products()->detach();
        $order->delete();
    }
}
