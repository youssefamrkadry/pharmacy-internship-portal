<?php

namespace Database\Seeders;

use App\Models\PharmacyOrderStatus;
use Illuminate\Database\Seeder;

class PharmacyOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PharmacyOrderStatus::all()->count() == 0){
            foreach(['Recieved', 'Approved', 'Rejected', 'Cancelled', 'Out For Delivery', 'Delivered'] as $status){
                PharmacyOrderStatus::factory()->create(['name' => $status]);
            }
        }
    }
}
