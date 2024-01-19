<?php

namespace Database\Seeders;

use App\Models\Apiary;
use Illuminate\Database\Seeder;

// Adjust the namespace and model name as per your application
class ApiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 300; ++$i) {
            Apiary::create([
                'user_id' => 1,
                'name' => $faker->name,
                'address' => $faker->address,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
            ]);
        }
    }
}
