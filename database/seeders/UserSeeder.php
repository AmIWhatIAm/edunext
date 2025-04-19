<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'student@gmail.com',
            // 'password' => Hash::make('password'),
            'password' => 'asdasdasd',
            'name' => 'Student Demo',
            'gender' => 'male',
            'bio' => 'I like to talk about science',
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'email' => 'lecturer@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Lecturer Demo',
            'gender' => 'female',
            'bio' => 'Math is my soul.',
            'role' => 'lecturer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
