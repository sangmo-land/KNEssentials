<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    // Static property to store categories
    protected static $categories = ['Music', 'Health Care', 'Fashion', 'Food Delivery'];

    public function definition()
    {
        // Ensure uniqueness by popping elements from the array
        $name = array_pop(self::$categories);

        return [
            'name' => $name,
            'description' => $this->faker->sentence(20),
            'features' => [
            $this->faker->sentence(4),
            $this->faker->sentence(4),
            $this->faker->sentence(4),
            ],
        ];
    }
}