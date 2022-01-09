<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (Student::count() == 0) {

            Student::insert([

                [
                    'student_id' => '1510',
                    'name' => 'Anik Barua',
                    'email' => 'anikclassroom@gmail.com',
                    'phone_num' => '01516710608',
                    'address' => 'Nondonkanon 1 no lane, Chattogram',
                    'batch' => '10',
                ],
                [
                    'student_id' => '1520',
                    'name' => 'Avishek Chowdhury',
                    'email' => 'avishekchy45@gmail.com',
                    'phone_num' => '01816486550',
                    'address' => 'Sadarghat, Chattogram',
                    'batch' => '10',

                ],
                [
                    'student_id' => '1530',
                    'name' => 'Mohammad Ahasan hossen',
                    'email' => 'ahasanhossen57@gmail.com',
                    'phone_num' => '01842701022',
                    'address' => 'Raozan, Chattogram',
                    'batch' => '11',
                ],
                [
                    'student_id' => '1540',
                    'name' => 'Bill Gates',
                    'email' => 'bill@gmail.com',
                    'phone_num' => '',
                    'address' => '',
                    'batch' => '11',
                ],
                [
                    'student_id' => '1550',
                    'name' => 'Elon Musk',
                    'email' => 'elon@gmail.com',
                    'phone_num' => '',
                    'address' => '',
                    'batch' => '12',
                ],
                [
                    'student_id' => 'demo_student',
                    'name' => 'Mark Zuckerberg',
                    'email' => 'zuckn@gmail.com',
                    'phone_num' => '',
                    'address' => '',
                    'batch' => '34',
                ],
            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
