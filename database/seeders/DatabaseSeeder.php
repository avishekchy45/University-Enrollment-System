<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserAccountSeeder::class,
            AdminSeeder::class,
            TeacherSeeder::class,
            AdvisorSeeder::class,
            StudentSeeder::class,
            DepartmentSeeder::class,
            SemesterSeeder::class,
            SessionSeeder::class,
            CourseSeeder::class,
            CourseLimitationSeeder::class,
            EnrollmentSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
