<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PharmacyOrderUser>
 */
class PharmacyOrderUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => random_int(16,80),
            //'gender' => array_rand(['male', 'female']),
            'mobile_number' => fake()->phoneNumber(),
        ];
    }
}
