<?php

namespace Database\Seeders;

use App\Models\Hive;
use Illuminate\Database\Seeder;

class BikubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 1000; ++$i) {
            Hive::create([
                'apiary_id' => $faker->numberBetween(1, 3),
                'queen_id' => $faker->numberBetween(1, 15),
                'user_id' => 1,
                'super' => $faker->numberBetween(0, 10),
                'hiveDescription' => $faker->text,
                'hiveStrength' => $faker->numberBetween(0, 10),
            ]);
        }
    }
}
