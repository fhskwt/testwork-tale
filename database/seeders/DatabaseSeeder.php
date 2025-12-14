<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Option;
use App\Models\ProductOptionStore;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 НАСТРОЙКИ
        $productsCount = env('SEED_PRODUCTS', 500); // Кол-во товаров
        $noOptionsRate = env('SEED_NO_OPTIONS_RATE', 0.3); // Вероятность товара БЕЗ опций
        $minOptions    = env('SEED_MIN_OPTIONS', 1); // Мин. кол-во опций
        $maxOptions    = env('SEED_MAX_OPTIONS', 5); // Макс. кол-во опций

        Product::factory($productsCount)->create()->each(function ($product) use (
            $noOptionsRate,
            $minOptions,
            $maxOptions
        ) {

            // Товар БЕЗ опций
            if (mt_rand() / mt_getrandmax() < $noOptionsRate) {
                ProductOptionStore::factory()->create([
                    'product_id' => $product->id,
                    'option_id'  => null,
                ]);

                return;
            }

            // Товар С опциями
            $optionsCount = rand($minOptions, $maxOptions);

            $options = Option::factory($optionsCount)->create([
                'product_id' => $product->id,
            ]);

            foreach ($options as $option) {
                ProductOptionStore::factory()->create([
                    'product_id' => $product->id,
                    'option_id'  => $option->id,
                ]);
            }
        });
    }
}
