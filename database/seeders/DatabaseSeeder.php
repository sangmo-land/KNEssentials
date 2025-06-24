<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
           // UserSeeder::class,
            //CategorySeeder::class,
            //AdminSeeder::class,
            //ProductSeeder::class,
            //ReviewSeeder::class,
            //OrderSeeder::class,
           
            ArtistSeeder::class,
            AlbumSeeder::class,
            TrackSeeder::class,
           
        ]);
    }
}