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
        
        // Subject-specific chapter titles with dedicated PDF file names
        $subjectContent = [
            'Mathematics' => [
                ['Calculus Fundamentals', 'calculus_fundamentals.pdf'],
                ['Linear Algebra', 'linear_algebra.pdf'],
                ['Statistics & Probability', 'statistics_probability.pdf'],
                ['Differential Equations', 'differential_equations.pdf'],
                ['Discrete Mathematics', 'discrete_mathematics.pdf']
            ],
            'Physics' => [
                ['Classical Mechanics', 'classical_mechanics.pdf'],
                ['Electromagnetism', 'electromagnetism.pdf'],
                ['Thermodynamics', 'thermodynamics.pdf'],
                ['Quantum Physics', 'quantum_physics.pdf'],
                ['Wave Theory', 'wave_theory.pdf']
            ],
            'Chemistry' => [
                ['Organic Chemistry', 'organic_chemistry.pdf'],
                ['Inorganic Chemistry', 'inorganic_chemistry.pdf'],
                ['Biochemistry', 'biochemistry.pdf'],
                ['Physical Chemistry', 'physical_chemistry.pdf'],
                ['Analytical Methods', 'analytical_methods.pdf']
            ],
            'Biology' => [
                ['Cell Biology', 'cell_biology.pdf'],
                ['Genetics & DNA', 'genetics_dna.pdf'],
                ['Human Anatomy', 'human_anatomy.pdf'],
                ['Ecology Systems', 'ecology_systems.pdf'],
                ['Evolutionary Biology', 'evolutionary_biology.pdf']
            ],
            'History' => [
                ['Ancient Civilizations', 'ancient_civilizations.pdf'],
                ['Medieval Period', 'medieval_period.pdf'],
                ['Renaissance & Reformation', 'renaissance_reformation.pdf'],
                ['World Wars', 'world_wars.pdf'],
                ['Modern History', 'modern_history.pdf']
            ],
            'Geography' => [
                ['Physical Geography', 'physical_geography.pdf'],
                ['Human Geography', 'human_geography.pdf'],
                ['Cartography', 'cartography.pdf'],
                ['Climate Systems', 'climate_systems.pdf'],
                ['Urban Geography', 'urban_geography.pdf']
            ],
            'Literature' => [
                ['Classical Literature', 'classical_literature.pdf'],
                ['Modern Fiction', 'modern_fiction.pdf'],
                ['Poetry Analysis', 'poetry_analysis.pdf'],
                ['Drama & Theater', 'drama_theater.pdf'],
                ['Literary Criticism', 'literary_criticism.pdf']
            ],
            'Economics' => [
                ['Microeconomics', 'microeconomics.pdf'],
                ['Macroeconomics', 'macroeconomics.pdf'],
                ['International Trade', 'international_trade.pdf'],
                ['Financial Markets', 'financial_markets.pdf'],
                ['Economic Development', 'economic_development.pdf']
            ]
        ];

        // Ensure each subject has at least 3 chapters with PDF files
        foreach ($subjectContent as $subject => $chapters) {
            // Create 3 chapters per subject
            for ($i = 0; $i < 3; $i++) {
                // Lecturer ID between 1-6 (including the main lecturer account)
                $lecturerId = $faker->numberBetween(1, 6);
                
                // Get chapter title and PDF filename from the predefined list
                $chapterInfo = $chapters[$i];
                $title = $chapterInfo[0];
                $fileName = $chapterInfo[1];
                
                DB::table('chapters')->insert([
                    'lecturer_id' => $lecturerId,
                    'name' => $title,
                    'subject' => $subject,
                    'time_to_complete' => $faker->numberBetween(30, 120), // minutes
                    'file_upload' => $fileName, // Always include PDF file
                    'description' => "This chapter covers the essential concepts of $title in $subject, including key theories, practical applications, and assessment methods.",
                    'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                    'updated_at' => $faker->dateTimeBetween('-1 month', 'now'),
                ]);
            }
        }
        
        // Add some additional chapters with PDFs (about 10 more)
        for ($i = 0; $i < 10; $i++) {
            $subject = $faker->randomElement(array_keys($subjectContent));
            $chapterIndex = $faker->numberBetween(3, 4); // Use the 4th or 5th chapter option
            $chapterInfo = $subjectContent[$subject][$chapterIndex];
            
            DB::table('chapters')->insert([
                'lecturer_id' => $faker->numberBetween(1, 6),
                'name' => $chapterInfo[0],
                'subject' => $subject,
                'time_to_complete' => $faker->numberBetween(30, 120),
                'file_upload' => $chapterInfo[1], // Always include PDF file
                'description' => $faker->paragraph(2),
                'created_at' => $faker->dateTimeBetween('-6 months', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
