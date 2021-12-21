<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    if (Enrollment::count() == 0) {

      Enrollment::insert([

        [
          'student_id' => '1550',
          'course_id' => 1,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1550',
          'course_id' => 2,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1550',
          'course_id' => 3,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1540',
          'course_id' => 4,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1540',
          'course_id' => 5,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1540',
          'course_id' => 6,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1540',
          'course_id' => 1,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1530',
          'course_id' => 5,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1530',
          'course_id' => 6,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1530',
          'course_id' => 1,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1530',
          'course_id' => 2,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1520',
          'course_id' => 8,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1520',
          'course_id' => 9,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1520',
          'course_id' => 4,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1520',
          'course_id' => 1,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1510',
          'course_id' => 7,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1510',
          'course_id' => 8,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1510',
          'course_id' => 9,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1510',
          'course_id' => 10,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
        [
          'student_id' => '1510',
          'course_id' => 1,
          'session' => 'Spring 2022',
          'type' => 'Regular',
          'status' => 'Pending',
        ],
      ]);
    } else {
      echo "\e[31mTable is not empty, therefore NOT ";
    }
  }
}
