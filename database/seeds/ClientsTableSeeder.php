<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 50 product records
        for ($i = 0; $i < 50; $i++) {
            Client::create([
                'dni' => $faker->randomNumber(9),
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'city' => $faker->city,
                'address' => $faker->address,
                'postal_code' => $faker->randomNumber(5),
                'phone' => $faker->randomNumber(9),
            ]);
        }
    }
}
