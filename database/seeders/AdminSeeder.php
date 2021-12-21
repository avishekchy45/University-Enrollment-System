<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(Admin::count() == 0){

            Admin::insert([

                [
                    'name' => 'Admin',
              'email' => 'admin@gmail.com',
              'admin_id' =>'Admin',
                ],
               
                

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    
    }
}
