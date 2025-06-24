<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        // Create 20 products if none exist
        $products = Product::all();

        if ($products->isEmpty()) {
            $products = Product::factory(20)->create();
        }

        // Create 5 reviews for each product
        foreach ($products as $product) {
            Review::factory(5)->create(['product_id' => $product->id]);
        }
    }
}