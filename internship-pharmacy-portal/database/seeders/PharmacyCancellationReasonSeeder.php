<?php

namespace Database\Seeders;

use App\Models\PharmacyCancellationReason;
use Illuminate\Database\Seeder;

class PharmacyCancellationReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PharmacyCancellationReason::all()->count() == 0){
            foreach(['Order timed out', "Customer doesn't need order anymore", 'Item not available'] as $reason){
                PharmacyCancellationReason::factory()->create(['name' => $reason]);
            }
        }
    }
}
