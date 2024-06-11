<?php

namespace Database\Seeders;

use App\Models\StudyPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = file_get_contents('database/seeders/jsons/Plan.json');
        $plans = json_decode($jsonFilePath, true);
        foreach ($plans as $plan) {
            StudyPlan::create([
                'start' => $plan['year'],
                'major_id' => $plan['degree_id'],
                'end' => $plan['year'] + 4,
                // 'description' => $plan['description']
            ]);
        }
    }
}
