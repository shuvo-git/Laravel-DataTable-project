<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        // Create 100 customer records
        for ($i = 0; $i < 100; $i++) {
            Customer::create([
                'name' => $faker->name,
            ]);
        }
    }
}
