<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ScrappedDataSeeder extends Seeder
{


    public function run(): void
    {
        $retailers = DB::table('retailers')->pluck('id');
        $products = DB::table('products')->pluck('id');
        $faker = Faker::create();

        $data = [];
        $batch_size = 500;

        foreach($retailers as $retailerId) {
            foreach($products as $productId) {
                for($day = 0; $day < 365; $day++) {
                    $data[] = [
                        'product_id' => $productId,
                        'retailer_id' => $retailerId,
                        'title' => $faker->sentence(3),
                        'description' => $faker->paragraph,
                        'price' => $faker->randomFloat(2, 1, 1000),
                        'image' => json_encode([$faker->imageUrl(), $faker->imageUrl()]),
                        'rating' => $faker->numberBetween(1, 5),
                        'avg_rating' => $faker->randomFloat(1, 1, 5),
                    ];

                    if(count($data) >= $batch_size) {
                        DB::table('scrapped_data')->insert($data);
                        $data = [];
                    }
                }
            }
        }
            if(count($data) > 0) {
                DB::table('scrapped_data')->insert($data);
            }
    }
}
