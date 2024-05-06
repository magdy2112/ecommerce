<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use PHPUnit\Framework\Constraint\IsFalse;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPayment>
 */
class UserPaymentFactory extends Factory
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
            'payment_type'=>fake()->creditCardType(),
            // 'provider'=>fake()->randomElement(['cib','masr','hsbc']),
            'creditCardNumber'=>fake()->creditCardNumber(),
              'expirationDate'=>fake()->creditCardExpirationDate(false),


        ];
    }
}

