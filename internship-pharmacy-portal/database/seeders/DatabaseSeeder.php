<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PharmacyCancellationDetail;
use App\Models\PharmacyCancellationReason;
use App\Models\PharmacyOrder;
use App\Models\PharmacyOrderImage;
use App\Models\PharmacyOrderItem;
use App\Models\PharmacyOrderStatus;
use App\Models\PharmacyOrderUser;
use App\Models\PharmacyOrderUserAddress;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Making the users and their addresses
        $pharmacy_users = PharmacyOrderUser::factory()->count(10)->create();
        foreach($pharmacy_users as $user){
            PharmacyOrderUserAddress::factory()->create(['user_id' => $user->id]);
        }

        // Extra addresses as if a user can have multiple addresses
        PharmacyOrderUserAddress::factory()->count(5)->create();

        // Call the Status and Cancellation Reasons Seeders
        $this->call([
            PharmacyOrderStatusSeeder::class,
            PharmacyCancellationReasonSeeder::class
        ]);

        // Add Pharmacies
        User::factory()->count(3)->create();

        // Create the pharmacy orders and a single item for each
        $pharmacy_orders = PharmacyOrder::factory()->count(10)->create();
        foreach($pharmacy_orders as $order){
            PharmacyOrderItem::factory()->create(['pharmacy_order_id' => $order->id]);
            PharmacyOrderImage::factory()->create(['pharmacy_order_id' => $order->id]);
        }

        // Extra items as if an order can have multiple items
        PharmacyOrderItem::factory()->count(10)->create();
        // Extra images as if an order can have multiple images
        PharmacyOrderImage::factory()->count(10)->create();

        // Create the cancellation details records for cancelled tables
        foreach(PharmacyOrder::where('status_id', 4)->get() as $cancelled_order){
            $cancellation_detail = PharmacyCancellationDetail::factory()->create(['pharmacy_order_id' => $cancelled_order->id]);
            // Join it with a reason in the pivot table
            $cancellation_detail->pharmacy_cancellation_reasons()->attach(PharmacyCancellationReason::all()->random());
        }
    }
}
