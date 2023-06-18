<?php

namespace Database\Factories;

use App\Models\PharmacyOrderItem;
use App\Models\PharmacyOrderStatus;
use App\Models\PharmacyOrderUser;
use App\Models\PharmacyOrderUserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PharmacyOrder>
 */
class PharmacyOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_address = PharmacyOrderUserAddress::all()->random();
        $user = $user_address->getAttribute('user_id');
        return [
            'order_number' => Str::random(10),
            'user_address_id' => $user_address,
            'user_id' => $user,
            'status_id' => PharmacyOrderStatus::all()->random(),
            'total_list_price' => fake()->randomFloat(2,0.5,500),
            'total_discount' => fake()->randomFloat(2,0,1),
            'delivery_charge' => random_int(1,3)*10,
            'net_amount' => function (array $attributes) {
                return $attributes['total_list_price'] * $attributes['total_discount'] + $attributes['delivery_charge'];
            },
            'order_notes' => Str::random(100),
            'payment_method_id' => random_int(0,1),
            'accepted_at' => fake()->dateTime(),
            'assigned_at' => fake()->dateTime(),
        ];
    }
}
