<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // create demo lecturer
        DB::table('users')->insert([
            'email' => 'lecturer@edu.com',
            'password' => Hash::make('password123'),
            'name' => 'Dr. James Wilson',
            'gender' => 'male',
            'bio' => 'Department head with 15 years of teaching experience in Mathematics and Physics.',
            'role' => 'lecturer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        
        // Create lecturers (5)
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'name' => $faker->name,
                'gender' => $faker->randomElement(['male', 'female', 'private']),
                'bio' => $faker->paragraph(2),
                'role' => 'lecturer',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // create demo student
        DB::table('users')->insert([
            'email' => 'student@edu.com',
            'password' => Hash::make('password123'),
            'name' => 'Sarah Johnson',
            'gender' => 'female',
            'bio' => 'Third-year student majoring in Biology with interest in marine ecology.',
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Create students (8)
        for ($i = 1; $i <= 8; $i++) {
            DB::table('users')->insert([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'name' => $faker->name,
                'gender' => $faker->randomElement(['male', 'female', 'private']),
                'bio' => $faker->paragraph(1),
                'role' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}