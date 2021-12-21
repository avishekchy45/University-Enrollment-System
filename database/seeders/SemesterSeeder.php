<?php

namespace Database\Seeders;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Semester::count() == 0){

            Semester::insert([

                [
                    'semester_no' =>'1st', 
                ],
                [
                    'semester_no' =>'2nd', 
                ],
                [
                    'semester_no' =>'3rd', 
                ],
                [
                    'semester_no' =>'4th', 
                ],
                [
                    'semester_no' =>'5th', 
                ],
                [
                    'semester_no' => '6th', 
                ],
                [
                    'semester_no' => '7th', 
                ],
                [
                    'semester_no' => '8th', 
                ],
               
                

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
