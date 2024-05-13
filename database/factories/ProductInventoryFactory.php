<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductInventory>
 */
class ProductInventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            // 'product_id'=>Product::all()->id,
            // 'product_id'=>Product::all()->random()->id,

            'quantity'=>fake()->unique()->numberBetween(500,1000),
        ];
    }
}
