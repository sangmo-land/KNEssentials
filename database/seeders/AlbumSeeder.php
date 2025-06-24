<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::all()->each(function ($artist) {
            Album::factory()
                ->count(3)
                ->for($artist)
                ->create();
        });
    }
}