<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Retailer;

class RetailerFactory extends Factory
{
    public function definition()
    {
        $model = Retailer::class;

        return [
            'name' => $this->faker->company,
            'currency' => $this->faker->currencyCode,
            'logo' => $this->faker->imageUrl(100, 100),
            'link' => $this->faker->url,
        ];
    }
}
