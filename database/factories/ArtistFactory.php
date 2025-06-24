<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
    
        public function definition(): array
        {
            return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'artist_name' => fake()->optional()->userName(),
            'bio' => fake()->paragraph(),
            'cover_image' => fake()->imageUrl(640, 480, 'music'),
            ];
        }
}
