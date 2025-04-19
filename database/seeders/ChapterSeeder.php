<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterSeeder extends Seeder
{
    public function run()
    {
        DB::table('chapters')->insert([
            'lecturer_id' => 2,
            'name' => 'Introduction to Maths',
            'subject' => 'Mathematics',
            'time_to_complete' => 60,
            'description' => 'Learn the basics of Maths',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
