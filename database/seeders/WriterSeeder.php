<?php

namespace Database\Seeders;

use App\Models\Writer;
use Illuminate\Database\Seeder;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake();
        $writers = [
            ['name' => 'Bia Pratama', 'role' => 'Machine Learning Specialist'],
            ['name' => 'Sabrina Wulandari', 'role' => 'HCI Researcher'],
            ['name' => 'Rafi Yudhistira', 'role' => 'Network Security Analyst'],
            ['name' => 'Naya Dewi', 'role' => 'Data Engineer'],
        ];

        foreach ($writers as $writer) {
            Writer::updateOrCreate(
                ['name' => $writer['name']],
                [
                    'name' => $writer['name'],
                    'role' => $writer['role'],
                    'bio' => $faker->sentences(2, true),
                ]
            );
        }
    }
}
