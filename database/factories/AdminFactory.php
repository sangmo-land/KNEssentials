<?php

namespace Database\Factories;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
class AdminFactory extends Factory
{
protected $model = Admin::class;

public function definition()
{
return [
'name' => $this->faker->name,
'email' => $this->faker->unique()->safeEmail,
'password' => bcrypt('admin123'),
];
}
}
