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
        Schema::create('pet_images', function (Blueprint $table) {
            $table->id();                       // id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('image_path', 500);  // image_path VARCHAR(500) NOT NULL
            $table->foreignId('pet_id')         // pet_id INT UNSIGNED NOT NULL
                  ->constrained('pets')         // references id on pets table
                  ->cascadeOnDelete();          // ON DELETE CASCADE (optional, but common)
            $table->timestamps();               // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_images');
    }
};
