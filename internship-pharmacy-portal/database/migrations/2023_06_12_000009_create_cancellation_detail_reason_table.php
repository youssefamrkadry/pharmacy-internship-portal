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
        Schema::create('cancellation_detail_reason', function (Blueprint $table) {
            $table->id();

            $table->foreignId('detail_id')->constrained(table: 'pharmacy_cancellation_details');
            $table->foreignId('reason_id')->constrained(table: 'pharmacy_cancellation_reasons');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellation_detail_reason');
    }
};
