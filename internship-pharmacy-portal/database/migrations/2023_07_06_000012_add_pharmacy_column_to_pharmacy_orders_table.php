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
        Schema::table('pharmacy_orders', function (Blueprint $table) {
            $table->foreignId('pharmacy_id')->constrained(table: 'users')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pharmacy_orders', function (Blueprint $table) {
            if(Schema::hasColumn('pharmacy_orders','pharmacy_id')){
                $table->dropForeign('pharmacy_orders_pharmacy_id_foreign');
                $table->dropColumn('pharmacy_id');
            }
        });
    }
};
