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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('region'); // ภาค เช่น เหนือ ใต้ กลาง อีสาน
            $table->integer('duration_days'); // จำนวนวันของทัวร์
            $table->integer('price'); // ราคา
            $table->integer('min_people')->default(1); // ขั้นต่ำของผู้ร่วมทัวร์
            $table->timestamps(); // created_at, updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
