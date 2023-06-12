<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pharmacy_cancellation_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pharmacy_order_id')->constrained(table: 'pharmacy_orders');
            $table->foreignId('cancellation_reason_id')->constrained(table: 'pharmacy_cancellation_reasons');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_cancellation_details');
    }
};
