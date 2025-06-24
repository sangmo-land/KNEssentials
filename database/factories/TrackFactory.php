<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album; // Import the Album model
use App\Models\Track; // It's good practice to explicitly import the model

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Track::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // This line is changed to use an existing Album's ID.
            // It fetches a random existing Album from the database and uses its 'id'.
            // IMPORTANT: This assumes there is at least one Album record in your database.
            // If no albums exist, this will cause an error.
            'album_id' => Album::inRandomOrder()->first()->id,
            'title' => fake()->words(3, true),
            'duration' => fake()->numberBetween(120, 360), // 2-6 minutes
            'file_path' => 'tracks/' . fake()->uuid() . '.mp3',
            'track_number' => fake()->numberBetween(1, 15),
            'genre' => fake()->randomElement(['Rock', 'Pop', 'Jazz', 'Classical', 'Hip-Hop']),
            'release_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'lyrics' => fake()->paragraphs(3, true),
            'plays' => fake()->numberBetween(0, 100000),
        ];
    }
}