<?php

namespace Database\Factories;

use App\Models\PharmacyOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PharmacyOrderImage>
 */
class PharmacyOrderImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_url' => fake()->url(),
            'pharmacy_order_id' => PharmacyOrder::all()->random()
        ];
    }
}
