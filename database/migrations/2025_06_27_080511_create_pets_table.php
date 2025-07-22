<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
        $table->id(); // or you can use string 'slug' as primary if needed
        $table->string('slug')->unique();
        $table->string('name');
        $table->string('breed');
        $table->string('age');
        $table->string('weight');
        $table->string('type'); // e.g., Dog / Cat
        $table->text('description');
        $table->string('status'); // e.g., Available / Adopted
        $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};