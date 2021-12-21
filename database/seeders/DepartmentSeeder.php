<?php

namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Department::count() == 0){

            Department::insert([

                [
                    'shortform' => 'CSE', 
              'fullfrom' => 'Computer Science & Engineering',
                ],
                [
                    'shortform' => 'EEE', 
              'fullfrom' => 'Electrical and Electronic Engineering',
                ],
               
                

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
