<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()
            ->count(2)
            ->hasClient(50)
            ->create();
            
        Employee::factory()
            ->count(1)
            ->hasClient(25)
            ->create();

        Employee::factory()
            ->count(5)
            ->create();
    }
}
