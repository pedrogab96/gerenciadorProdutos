<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);

        $products = Product::factory()->count(10)->create();
        Order::factory()->count(10)->create()->each(function ($order) use ($products) {
            $order->products()->attach($products->random(rand(1, 3))->pluck('id'));
            $order->total_price = $order->products->sum('price');
            $order->save();
        });
    }
}
