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

        // generate 5 random users
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'email'      => $faker->unique()->safeEmail,
                'password'   => Hash::make('password'),
                'name'       => $faker->name,
                'gender'     => $faker->randomElement(['male', 'female']),
                'bio'        => $faker->sentence,
                'role'       => $faker->randomElement(['student', 'lecturer']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}