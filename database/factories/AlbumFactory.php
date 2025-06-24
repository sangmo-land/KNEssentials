<?php

namespace Database\Factories;

use App\Models\Album; // Import the Album model
use App\Models\Artist; // Import the Artist model
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Use an existing artist_id from the database
            // This assumes you have at least one artist already in your database.
            // If no artists exist, you might need to seed them first.
            'artist_id' => Artist::inRandomOrder()->first()->id,
            'title' => fake()->words(3, true) . ' Album',
            'release_date' => fake()->dateTimeBetween('-5 years', 'now'),
            'cover_art' => fake()->imageUrl(640, 640, 'album'),
        ];
    }
}
