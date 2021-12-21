<?php

namespace Database\Seeders;

use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (UserAccount::count() == 0) {

            UserAccount::insert([

                [
                    'username' => 'Admin',
                    'role' => 'admin',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => 'aniksen_cse',
                    'role' => 'teacher',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => 'minhaz_cse',
                    'role' => 'teacher',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => '1510',
                    'role' => 'student',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => '1520',
                    'role' => 'student',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => '1530',
                    'role' => 'student',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => '1540',
                    'role' => 'student',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => '1550',
                    'role' => 'student',
                    'password' => Hash::make('123456'),
                ],

            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
