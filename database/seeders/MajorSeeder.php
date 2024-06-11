<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = file_get_contents('database/seeders/jsons/Major.json');
        $degrees = json_decode($jsonFilePath, true);
        foreach ($degrees as $degree) {
            Major::create([
                'name' => $degree['name'],
            ]);
        }
    }
}
