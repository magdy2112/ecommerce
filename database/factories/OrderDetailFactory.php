<?php

namespace Database\Factories;

use App\Models\PaymentDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [









            'user_id'=>User::all()->random()->id,
            // 'total'=>fake()->numberBetween(),
            'amount'=>fake()->numberBetween(10,100),
            // 'provider'=>fake()->creditCardType(),
            'status'=>fake()->randomElement(['success','failed','pending']),





        ];
    }
}
