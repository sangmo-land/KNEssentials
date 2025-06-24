<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id');
        $products = Product::pluck('id');

        // Create 30 orders
        Order::factory()->count(30)
            ->create(['user_id' => fn() => fake()->randomElement($users)])
            ->each(function ($order) use ($products) {
                // Create 3-5 order items per order
                OrderItem::factory()->count(rand(3, 5))
                    ->create([
                        'order_id' => $order->id,
                        'product_id' => fn() => fake()->randomElement($products)
                    ]);
            });
    }
}