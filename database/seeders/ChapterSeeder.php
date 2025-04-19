<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChapterSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('chapters')->insert([
                'lecturer_id'      => $faker->numberBetween(1, 5),
                'name'             => $faker->sentence(1),
                'subject'          => $faker->randomElement([
                    'Mathematics',
                    'Physics',
                    'Chemistry',
                    'Biology',
                    'Computer Science',
                    'History',
                    'Geography',
                    'Literature',
                    'Economics'
                ]),
                'time_to_complete' => $faker->numberBetween(30, 120),
                'description'      => $faker->sentence(4),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
