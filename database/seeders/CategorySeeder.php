<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $faker = fake();
        $categories = ['Data Science', 'Network Security'];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['name' => $name],
                [
                    'name' => $name,
                    'description' => $faker->paragraph(),
                ]
            );
        }
    }
}
