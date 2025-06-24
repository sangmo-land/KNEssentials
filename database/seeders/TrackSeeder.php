<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Track;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create tracks for each album
        Album::all()->each(function ($album) {
            Track::factory()
                ->count(10)
                ->for($album)
                ->create();
        });

        // Create standalone tracks (not linked to any album)
        Track::factory()
            ->count(15)
            ->create(['album_id' => null]);
    }
}