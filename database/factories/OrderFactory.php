<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
protected $model = Order::class;

public function definition()
{
return [
'user_id' => User::factory(),
'total_price' => $this->faker->randomFloat(2, 10, 1000),
'status' => 'pending',
];
}
}