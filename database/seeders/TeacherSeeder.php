<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        Teacher::create([
            'name' => 'Angel',
            'last_name_father' => 'Almanza',
            'last_name_mother' => 'Trejo',
            'birthdate' => '2002-10-02',
            'email' => 'almanza@teacher.com',
            'phone' => '1234567890',
            'address' => 'Calle 123',
            'user_id' => 1,
        ]);

        Teacher::create([
            'name' => 'Alexander',
            'last_name_father' => 'Higuera',
            'last_name_mother' => 'Sanabria',
            'birthdate' => '2002-09-02',
            'email' => 'higuera@teacher.com',
            'phone' => '1234567891',
            'address' => 'Calle 123',
            'user_id' => 2,
        ]);
    }
}
