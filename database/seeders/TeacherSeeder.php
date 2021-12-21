<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user= UserAccount::where('role', '=','teacher')->pluck('username')->toArray() ;
        // dd($user->);

        if (Teacher::count() == 0) {

            Teacher::insert([

                [
                    'name' => 'Anik Sen',
                    'email' => 'aniksen.cuet09@gmail.com',
                    'teacher_id' => 'aniksen_cse',
                ],
                [
                    'name' => 'Syed Md. Minhaz Hossain',
                    'email' => 'minhaz027@yahoo.com',
                    'teacher_id' => 'minhaz_cse',
                ],


            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
