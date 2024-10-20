<?php

namespace Database\Factories;

use App\Models\Retailer;
use App\Models\ScrappingSession;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScrappingSessionFactory extends Factory
{
    protected $model = ScrappingSession::class;

    public function definition()
    {
        return [
            'retailer_id' => Retailer::factory(),
            'session_date' => $this->faker->date(),
        ];
    }
}
