<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    DB::table('pets')->insert([
        [
            'slug' => 'meow1',
            'type' => 'Cat',
            'name' => 'Pom Pom',
            'breed' => 'Chartreux',
            'age' => '1 year-old',
            'weight' => '13 kg',
            'image' => 'img/cat1.avif',
            'description' => 'Pom Pom is a quiet and observant friend with a beautiful silver-blue coat.',
            'status' => 'Available',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'slug' => 'woof1',
            'type' => 'Dog',
            'name' => 'Oreo',
            'breed' => 'Border Collie',
            'age' => '2 year-old',
            'weight' => '21 kg',
            'image' => 'img/dog1.avif',
            'description' => 'Oreo is an intelligent and energetic companion who loves to play fetch.',
            'status' => 'Available',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        // Add more...
    ]);
}

    
}
