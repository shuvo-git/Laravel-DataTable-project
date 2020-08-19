<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        //$faker->addProvider(new Faker\Provider\fr_FR\Address($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        
        // Create 100 department records
        for ($i = 0; $i < 100; $i++) {
            Department::create([
                'department' => $faker->department, //departmentName
            ]);
        }
    }
}
