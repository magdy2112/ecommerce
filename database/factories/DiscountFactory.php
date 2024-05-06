<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'product_id'=>Product::all()->random()->id,
            'type' => fake()->unique()->sentence(1),
            'description' => fake()->sentence(3),
            'percent' => fake()->numberBetween(0, 50),
            'status' => fake()->randomElement(['active','disactive'])


        ];
    }
}
