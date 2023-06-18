<?php

namespace Database\Factories;

use App\Models\PharmacyOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PharmacyOrderItem>
 */
class PharmacyOrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(15),
            'list_price' => fake()->randomFloat(2,0.5,50),
            'quantity' => random_int(1,5),
            'pharmacy_order_id' => PharmacyOrder::all()->random(),
            'image_url' => fake()->url(),
            'form' => Arr::random(['Tablets', 'Flexpen', 'Suppository']),
            'unit' => Arr::random(['Pill', 'Bottle', 'Sachet']),
        ];
    }
}
