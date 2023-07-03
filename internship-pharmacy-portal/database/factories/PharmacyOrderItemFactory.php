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
        $json = file_get_contents('./public/json/meds.json');
        // Decode the JSON file
        $json_data = json_decode($json, true);
        $med = Arr::random($json_data['meds']);
        return [
            'name' => $med['name'],
            'list_price' => fake()->randomFloat(2,0.5,50),
            'quantity' => random_int(1,5),
            'pharmacy_order_id' => PharmacyOrder::all()->random(),
            'image_url' => $med['image'],
            'form' => Arr::random(['Tablets', 'Flexpen', 'Suppository']),
            'unit' => Arr::random(['Pill', 'Bottle', 'Sachet']),
        ];
    }
}
