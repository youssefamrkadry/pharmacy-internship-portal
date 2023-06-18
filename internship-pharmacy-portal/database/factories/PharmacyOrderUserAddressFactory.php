<?php

namespace Database\Factories;

use App\Models\PharmacyOrderUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PharmacyOrderUserAddress>
 */
class PharmacyOrderUserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => PharmacyOrderUser::all()->random(),
            'buliding_number' => fake()->buildingNumber(),
            'street_name' => fake()->streetName(),
            'city' => fake()->city(),
            'area' => fake()->streetName(),
            'type' => Arr::random(['Home', 'Office', 'Work']),
            'floor' => random_int(1,30),
            'apartment' => random_int(1,150),
            'landmark' => Str::random(20),
        ];
    }
}
