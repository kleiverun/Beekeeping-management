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
            \App\Models\Bikube::create([
                'bigård_idBigård' => $faker->numberBetween(1, 100),
                'bruker_idBruker' => $faker->numberBetween(1, 100),
                'antallSkattekasser' => $faker->numberBetween(1, 10),
                'identifikasjon' => $faker->sentence(7),
                'estimertStyrke' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
