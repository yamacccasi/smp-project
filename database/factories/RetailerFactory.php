<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class RetailerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'link' => $this->faker->url,
            'currency' => $this->faker->currencyCode,
            'logo' => $this->faker->imageUrl()
        ];
    }
}
