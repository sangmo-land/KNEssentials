<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 500),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'image' => $this->faker->imageUrl(200, 200, 'food'),
        ];
    }
}