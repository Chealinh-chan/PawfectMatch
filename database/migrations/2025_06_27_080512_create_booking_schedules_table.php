<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_schedules', function (Blueprint $table) {
            $table->id(); // Corresponds to booking_id
            $table->dateTime('booking_date');
            $table->string('phone_number');
            $table->string('status')->default('pending'); 
            
            // Foreign Keys linking to other tables
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('pet_id')->constrained('pets');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_schedules');
    }
};