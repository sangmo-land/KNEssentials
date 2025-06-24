<?php

namespace Database\Factories;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
protected $model = Contact::class;

public function definition()
{
return [
'name' => $this->faker->name,
'email' => $this->faker->safeEmail,
'message' => $this->faker->paragraph,
];
}
}