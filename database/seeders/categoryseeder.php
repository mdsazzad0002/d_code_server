<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('categories')->truncate();

        // Seed random data
        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            $categories[] = [
                'name' => $faker->word,
                'slug' => $faker->slug,
                'description' => $faker->sentence,
                'status' => $faker->randomElement([0, 1]),
                'uploads_id' => $faker->uuid,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('categories')->insert($categories);
    }
}
