<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 1 ; $i <= 15 ; $i++)
        {
            Employee::create([
                'name'  => $faker->name,
                'email' => $faker->email,
                'age' => $faker->numberBetween(1,100),
            ]);
            
        }
    }
}
