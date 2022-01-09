<?php

namespace Database\Seeders;

use App\Models\Advisor;
use Illuminate\Database\Seeder;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (Advisor::count() == 0) {

            Advisor::insert([

                [
                    'teacher_id' => 'aniksen_cse',
                    'batch' => '10',
                ],
                [
                    'teacher_id' => 'minhaz_cse',
                    'batch' => '11',
                ],
                [
                    'teacher_id' => 'aniksen_cse',
                    'batch' => '12',
                ],
                [
                    'teacher_id' => 'demo_teacher',
                    'batch' => '34',
                ],
            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
