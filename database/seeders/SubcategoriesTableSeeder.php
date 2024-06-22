<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use faker\Factory as Faker;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        // Clear existing records to start fresh
        DB::table('subcategories')->truncate();

        // Seed random data
        $subcategories = [];
        $categoryIds = range(1, 10); // Assuming you have 10 categories

        foreach ($categoryIds as $categoryId) {
            for ($i = 0; $i < 5; $i++) { // Create 5 subcategories per category
                $subcategories[] = [
                    'category_id' => $categoryId,
                    'name' => $faker->word,
                    'slug' => $faker->slug,
                    'status' => $faker->randomElement([0, 1]),
                    'description' => $faker->paragraph,
                    'uploads_id' => $faker->uuid,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('subcategories')->insert($subcategories);

    }
}
