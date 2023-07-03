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
        Schema::create('pharmacy_order_user_addresses', function (Blueprint $table) {
            $table->id();
            
            $table->string('address_global_id')->unique();
            $table->foreignId('user_id')->constrained(table: 'pharmacy_order_users');
            $table->string('buliding_number');
            $table->string('street_name');
            $table->string('city');
            $table->string('area');
            $table->string('type');
            $table->string('floor');
            $table->string('apartment');
            $table->string('landmark');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_order_user_addresses');
    }
};
