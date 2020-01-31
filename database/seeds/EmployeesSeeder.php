<?php

use App\Department;
use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, 100)->make()->each(function($employee){
            $department = Department::inRandomOrder()->first();
            $employee -> department() -> associate($department);
            $employee -> save();
        });
    }
}