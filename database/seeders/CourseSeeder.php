<?php

namespace Database\Seeders;

use App\Models\Charge;
use App\Models\Course;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Course::factory()
                ->has(Charge::factory()
                    ->count(5)
                    ->state(function (array $attributes, Course $course) {
                        return [
                            'course_id' => $course->id,
                            'teacher_id' => rand(1, 10),
                            'study_plan_id' => rand(1, 10),
                            'academic_period_id' => rand(1, 10),
                            'group_id' => rand(1, 10),
                        ];
                    })
                )
                ->has(Schedule::factory()
                    ->count(5)
                    ->state(function (array $attributes, Course $course) {
                        return [
                            'course_id' => $course->id,
                            'teacher_id' => rand(1, 10),
                            'group_id' => rand(1, 10),
                            'study_plan_id' => rand(1, 10),
                            'academic_period_id' => rand(1, 10),
                            'session_dasc_id' => rand(1, 10),
                            'classroom_id' => rand(1, 10),
                            'day_id' => rand(1, 10),
                            'block_id' => rand(1, 10),
                        ];
                    })
                )
                ->create();
            DB::table('course_study_plan')
                ->insert([
                    'course_id' => $i,
                    'study_plan_id' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            DB::table('course_major')
                ->insert([
                    'course_id' => $i,
                    'major_id' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
