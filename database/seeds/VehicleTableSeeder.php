<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $generator = $faker = new Faker\Generator();
        $faker->addProvider(new \MattWells\Faker\Vehicle\Provider($generator));

        for($i=1; $i<=50; $i++){
            Vehicle::create([
                'vehicle_registration'=> $faker->vehicleRegistration,
                'client_id'=>$faker->numberBetween(1,11),
                'model_id'=>$faker->numberBetween(1,30)
            ]);
        }
    }
}
