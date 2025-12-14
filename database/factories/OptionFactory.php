<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    protected $model = Option::class;

    public function definition(): array
    {
        return [
            'product_id' => null, // задаётся в сидере
            'height' => $this->faker->numberBetween(50, 200),
        ];
    }
}
