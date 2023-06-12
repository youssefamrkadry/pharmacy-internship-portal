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
        Schema::create('pharmacy_order_items', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedFloat('list_price');
            $table->unsignedInteger('quantity');
            $table->foreignId('pharmacy_order_id')->constrained(table: 'pharmacy_orders');
            $table->string('image_url');
            $table->string('form');
            $table->string('unit');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_order_items');
    }
};
