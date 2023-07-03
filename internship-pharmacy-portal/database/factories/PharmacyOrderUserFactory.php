<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'user_global_id' => Str::random(5),
            'name' => fake()->name(),
            'age' => random_int(16,80),
            'mobile_number' => fake()->phoneNumber(),
        ];
    }
}
