<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Retailer;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Retailer::factory()->count(10)->create();

        Product::factory()->count(1000)->create();
    }
}
