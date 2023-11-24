<?php

namespace Database\Seeders;

use App\Models\Apiary;
use Illuminate\Database\Seeder;

// Adjust the namespace and model name as per your application
class apiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; ++$i) {
            apiary::create([
                'name' => $faker->name,
                'bruker_idBruker' => $faker->numberBetween(1, 100),
                'address' => $faker->address,
            ]);
        }
    }
}
