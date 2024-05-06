<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ShoppingSession;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'product_id'=>Product::all()->random()->id,
            'user_id'=>User::all()->random()->id,

            // 'quantity'=>fake()->numberBetween(1,1),

        ];
    }
}
