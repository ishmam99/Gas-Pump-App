<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'role_id'=>'1',
            'name'=>'Admin',
           
            'email'=>'admin@mypump.com',
            'password'=>bcrypt('admin123')
        ]);
         DB::table('companies')->insert([
          
            'name'=>'Customer',
           
            'phone'=>'Not Applicable',
            
        ]);
        
    }
}
