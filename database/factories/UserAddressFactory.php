<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
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
            'address_line1'=>fake()->address(),
            'address_line2'=>fake()->address(),
            'city'=>fake()->city(),
            'country'=>fake()->country(),
            'telephone'=>fake()->tollFreePhoneNumber(),
            'mobile'=>fake()->e164PhoneNumber(),






        ];
    }
}
