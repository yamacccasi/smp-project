<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'manufacturer_part_number' => $this->faker->unique()->numerify('MPN-####'),
            'pack_size' => $this->faker->randomElement(['big-box', 'small-box', 'medium-box', 'large-box']),
            'image' => $this->faker->imageUrl()
        ];
    }
}
