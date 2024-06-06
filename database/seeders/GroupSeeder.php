<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\TeacherAttendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Group::factory()
                ->state(['major_id' => $i])
                ->has(TeacherAttendance::factory()
                    ->count(5)
                    ->state(function (array $attributes, Group $group) {
                        return [
                            'group_id' => $group->id,
                        ];
                    }))
                ->create();
        }
    }
}
