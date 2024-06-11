<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $descriptions = [
            'Python',
            'JavaScript',
            'Java',
            'C++',
            'Ruby',
            'PHP',
            'Swift',
        ];

        for ($i = 0; $i < count($descriptions); $i++) {
            Classroom::factory()
                ->state(function (array $attributes) use ($descriptions, $i) {
                    return [
                        'description' => $descriptions[$i],
                    ];
                })
                ->create();
        }
    }
}
