<?php

namespace Database\Seeders;

use App\Models\Bruker;
use Illuminate\Database\Seeder;

// Adjust the namespace and model name as per your application

class BrukerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; ++$i) {
            Bruker::create([
                'passord' => $faker->password,
                'fornavn' => $faker->firstName,
                'etternavn' => $faker->lastName,
                'epost' => $faker->email,
                'telefonnr' => $faker->phoneNumber,
                'adresse' => $faker->address,
            ]);
        }
    }
}
