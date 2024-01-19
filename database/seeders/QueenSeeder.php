<?php

namespace Database\Seeders;

use App\Models\Queen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QueenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 1500; ++$i) {
            Queen::create([
                'user_id' => 1,
                'queenMother' => null,
                'queenBreed' => $faker->text,
                'queenDescription' => $faker->text,
                'queenDate' => $faker->date,
            ]);
        }
    }
}
