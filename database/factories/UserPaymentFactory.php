<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'payment_type'=>fake()->randomElement(['cash','visa']),
            'provider'=>fake()->randomElement(['cib','masr','hsbc']),
            'account_num'=>fake()->creditCardNumber(),
              'expired'=>fake()->dateTimeThisCentury('+8 years'),


        ];
    }
}
