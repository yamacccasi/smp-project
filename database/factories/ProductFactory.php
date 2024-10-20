<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'manufacturer_part_number' => $this->faker->unique()->numerify('MPN-#####'),
            'pack_size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'images' => $this->faker->randomElements([$this->faker->imageUrl(), $this->faker->imageUrl()], rand(1, 2)),
            'rating_obj' => json_encode(['rating' => $this->faker->numberBetween(1, 5), 'reviews' => $this->faker->numberBetween(10, 100)]),
            'links' => $this->faker->randomElements([$this->faker->url, $this->faker->url], rand(1, 2)),
            'user_id' => User::exists() ? User::inRandomOrder()->first()->id : User::factory()->create()->id,
        ];
    }
}
