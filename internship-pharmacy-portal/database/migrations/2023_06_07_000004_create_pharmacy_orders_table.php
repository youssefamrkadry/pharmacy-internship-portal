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
        Schema::create('pharmacy_orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_number')->unique();
            $table->foreignId('user_address_id')->constrained(table: 'pharmacy_order_user_addresses');
            $table->foreignId('user_id')->constrained(table: 'pharmacy_order_users');
            $table->foreignId('status_id')->constrained(table: 'pharmacy_order_statuses');
            $table->Float('total_list_price');
            $table->Float('total_discount');
            $table->Float('delivery_charge');
            $table->Float('net_amount');
            $table->string('order_notes');
            $table->unsignedTinyInteger('payment_method_id');
            $table->dateTime('accepted_at');
            $table->dateTime('assigned_at');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_orders');
    }
};
