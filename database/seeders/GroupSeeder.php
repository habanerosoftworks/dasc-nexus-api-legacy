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
        // for ($i = 1; $i <= 10; $i++) {
        //     Group::factory()
        //         ->state(['major_id' => $i])
        //         ->has(TeacherAttendance::factory()
        //             ->count(5)
        //             ->state(function (array $attributes, Group $group) {
        //                 return [
        //                     'group_id' => $group->id,
        //                 ];
        //             }))
        //         ->create();
        // }


        $jsonFilePath = file_get_contents('database/seeders/jsons/Group.json');
        $groups = json_decode($jsonFilePath, true);
        foreach ($groups as $group) {
            $turn = 1;
            if ($group['shift'] == "M") {
                $turn = 1;
            } else {
                $turn = 2;
            }
            Group::create([
                // 'name' => $group['name'],
                'turn_id'=> $turn,
                'semester_id'=> $group['semester'],
                'major_id' => $group['degree_id']
            ]);
        }

    }
}
