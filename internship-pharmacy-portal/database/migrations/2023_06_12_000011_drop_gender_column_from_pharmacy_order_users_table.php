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
        Schema::table('pharmacy_order_users', function (Blueprint $table) {
            if(Schema::hasColumn('pharmacy_order_users','gender')){
                $table->dropColumn('gender');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pharmacy_order_users', function (Blueprint $table) {
            if(!Schema::hasColumn('pharmacy_order_users','gender')){
                $table->string('gender');
            }
        });
    }
};
