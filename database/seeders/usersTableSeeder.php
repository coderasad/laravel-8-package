<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
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
            'name'=>'Md. Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('rootadmin'),
        ]);
           
        DB::table('users')->insert([
            'role_id'=>'2', 
            'name'=>'Md. Author',
            'email'=>'author@gmail.com',
            'password'=>bcrypt('rootauthor'),
        ]);
    }
}
