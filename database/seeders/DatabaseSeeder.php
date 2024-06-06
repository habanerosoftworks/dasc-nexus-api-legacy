<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)
            ->has(Teacher::factory())
            ->create();
        $this->call([
            UserSeeder::class,
            TeacherSeeder::class,
            ClassroomSeeder::class,
            MajorSeeder::class,
            StudyPlanSeeder::class,
            AcademicPeriodSeeder::class,
            SessionDascSeeder::class,
            DaySeeder::class,
            GroupSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
