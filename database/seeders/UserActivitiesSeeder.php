<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Get all user IDs (assumes UserSeeder has been run)
        $lecturerIds = DB::table('users')->where('role', 'lecturer')->pluck('id')->toArray();
        $studentIds = DB::table('users')->where('role', 'student')->pluck('id')->toArray();
        $chapterIds = DB::table('chapters')->pluck('id')->toArray();
        
        // Activity types by user role
        $lecturerActivities = [
            'login', 'logout', 'chapter_create', 'chapter_update', 'profile_update'
        ];
        
        $studentActivities = [
            'login', 'logout', 'profile_update', 'chapter_view'
        ];
        
        // Create lecturer activities
        foreach ($lecturerIds as $lecturerId) {
            // Create 5-8 activities per lecturer
            $activityCount = $faker->numberBetween(5, 8);
            
            for ($i = 0; $i < $activityCount; $i++) {
                $activityType = $faker->randomElement($lecturerActivities);
                $activityId = null;
                
                // For chapter-related activities, add chapter ID
                if (in_array($activityType, ['chapter_create', 'chapter_update']) && !empty($chapterIds)) {
                    $activityId = $faker->randomElement($chapterIds);
                }
                
                DB::table('user_activities')->insert([
                    'user_id' => $lecturerId,
                    'last_activity_type' => $activityType,
                    'activity_id' => $activityId,
                    'is_active' => $faker->boolean(70),
                    'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
                    'updated_at' => now(),
                ]);
            }
        }
        
        // Create student activities
        foreach ($studentIds as $studentId) {
            // Create 3-6 activities per student
            $activityCount = $faker->numberBetween(3, 6);
            
            for ($i = 0; $i < $activityCount; $i++) {
                $activityType = $faker->randomElement($studentActivities);
                $activityId = null;
                
                // For chapter view activities, add chapter ID
                if ($activityType == 'chapter_view' && !empty($chapterIds)) {
                    $activityId = $faker->randomElement($chapterIds);
                }
                
                DB::table('user_activities')->insert([
                    'user_id' => $studentId,
                    'last_activity_type' => $activityType,
                    'activity_id' => $activityId,
                    'is_active' => $faker->boolean(70),
                    'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
