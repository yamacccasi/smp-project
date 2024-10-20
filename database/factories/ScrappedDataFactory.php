<?php

namespace Database\Factories;

use App\Models\ScrappedData;
use App\Models\ScrappingSession;
use App\Models\Product;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScrappedDataFactory extends Factory
{
    protected $model = ScrappedData::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'images' => $this->faker->randomElements([$this->faker->imageUrl(), $this->faker->imageUrl()], rand(1, 2)),
            'rating' => json_encode(['rating' => $this->faker->numberBetween(1, 5), 'reviews' => $this->faker->numberBetween(10, 100)]),
            'avg_rating' => $this->faker->numberBetween(1, 5),
            'session_id' => ScrappingSession::factory(),
            'product_id' => Product::factory(),
            'retailer_id' => Retailer::factory(),
        ];
    }
}
