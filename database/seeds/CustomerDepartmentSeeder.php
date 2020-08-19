<?php

use Illuminate\Database\Seeder;
use App\CustomerDepartment;

class CustomerDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 100 department records
        for ($i = 101; $i <= 200; ++$i) {
            for($j=0;$j<5;++$j){
                CustomerDepartment::create([
                    'customer_id' => rand(1,100),
                    'department_id' => $i, 
                ]);

            }
            
        }
    }
}
