<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
    class ReviewFactory extends Factory
    {
    protected $model = Review::class;

        public function definition()
        {
        return [
        'product_id' => function () {
        $product = Product::inRandomOrder()->first();
        return $product ? $product->id : Product::factory();
        },
        'user_id' => function () {
        $user = User::inRandomOrder()->first();
        return $user ? $user->id : User::factory();
        },
        'rating' => $this->faker->numberBetween(1, 5),
        'comment' => $this->faker->paragraph,
        ];
        }
    }