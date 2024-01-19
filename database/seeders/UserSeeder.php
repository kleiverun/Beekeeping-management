<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i=0;$i<1;++$i) {
            User::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => 'email@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phoneNumber' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}
