<?php

namespace Database\Factories;

use App\Models\PharmacyOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PharmacyCancellationDetail>
 */
class PharmacyCancellationDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pharmacy_order_id' => PharmacyOrder::where('status_id', 4)->get()->random(),
            'cancellation_note' => Str::random(20)
        ];
    }
}
