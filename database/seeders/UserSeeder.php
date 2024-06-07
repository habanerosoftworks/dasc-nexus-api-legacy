<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'AdminAlmanza',
            'email' => 'almanza@example.com',
            // 'password' => '$DASC_2024_HABANERO_SOFTWORKS',
            'password' => 'Almanza123'
        ]);

        User::create([
            'name' => 'AdminHiguera',
            'email' => 'higuera@example.com',
            // 'password' => '$DASC_2024_HABANERO_SOFTWORKS',
            'password' => 'Higuera123'
        ]);
    }
}
