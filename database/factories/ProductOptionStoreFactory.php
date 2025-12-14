<?php

namespace Database\Factories;

use App\Models\ProductOptionStore;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionStoreFactory extends Factory
{
    protected $model = ProductOptionStore::class;

    public function definition(): array
    {
        return [
            'product_id' => null,
            'option_id'  => null,
            'code_1c'    => strtoupper($this->faker->bothify('??##??##')),
        ];
    }
}
