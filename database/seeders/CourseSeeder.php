<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Semester;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    if (Course::count() == 0) {

      Course::insert([

        [
          'code' => 'CSE 110',
          'title' => 'Introduction to Computer System',
          'department_id' => 1,
          'semester_id' => 1,
          'type' => 'Laboratory',
          'credit' => '2',
        ],
        [
          'code' => 'EEE 101',
          'title' => 'Electrical Circuits I',
          'department_id' => 2,
          'semester_id' => 1,
          'type' => 'Theory',
          'credit' => '3',
        ],
        [
          'code' => 'MAT 105',
          'title' => 'Engineering Mathematics I',
          'department_id' => 1,
          'semester_id' => 1,
          'type' => 'Theory',
          'credit' => '3',
        ],
        [
          'code' => 'CSE 112',
          'title' => 'Structured Programming Laboratory',
          'department_id' => 1,
          'semester_id' => 2,
          'type' => 'Laboratory',
          'credit' => '2',
        ],
        [
          'code' => 'EEE 211',
          'title' => 'Electronics I',
          'department_id' => 2,
          'semester_id' => 2,
          'type' => 'Theory',
          'credit' => '3',
        ],
        [
          'code' => 'MAT 107',
          'title' => 'Engineering Mathematics II',
          'department_id' => 1,
          'semester_id' => 2,
          'type' => 'Theory',
          'credit' => '3',
        ],
        [
          'code' => 'CSE 222',
          'title' => 'Data Structure Laboratory',
          'department_id' => 1,
          'semester_id' => 3,
          'type' => 'Laboratory',
          'credit' => '1.5',
        ],
        [
          'code' => 'CSE 211',
          'title' => 'Object Oriented Programming',
          'department_id' => 1,
          'semester_id' => 3,
          'type' => 'Theory',
          'credit' => '3',
        ],
        [
          'code' => 'MAT 201',
          'title' => 'Engineering Mathematics III',
          'department_id' => 1,
          'semester_id' => 3,
          'type' => 'Theory',
          'credit' => '3',
        ],
        [
          'code' => 'EEE 311',
          'title' => 'Digital Electronics',
          'department_id' => 2,
          'semester_id' => 3,
          'type' => 'Theory',
          'credit' => '3',
        ],
      ]);
    } else {
      echo "\e[31mTable is not empty, therefore NOT ";
    }
  }
}
