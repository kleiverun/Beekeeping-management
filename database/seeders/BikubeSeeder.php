<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BikubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 200; ++$i) {
            \App\Models\Apiary::create([
                'apiary_idApiary' => $faker->numberBetween(1, 100),
                'bruker_idBruker' => $faker->numberBetween(1, 100),
                'super' => $faker->numberBetween(1, 10),
                'hiveDescription' => $faker->sentence(7),
                'hiveStrength' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
