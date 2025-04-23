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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade'); // เชื่อมกับ tour
            $table->date('travel_date');           // วันที่เดินทาง
            $table->integer('number_of_people');   // จำนวนผู้เดินทาง
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('payment_status')->default('pending'); // pending / paid
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
