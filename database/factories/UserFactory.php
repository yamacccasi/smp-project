<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('password'),
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement(['superuser', 'user']),
            'location' => $this->faker->city,
        ];
    }
}
