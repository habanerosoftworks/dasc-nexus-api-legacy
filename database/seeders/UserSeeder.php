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
            'username' => 'AdminAlmanza',
            'email' => 'almanza@example.com',
            'password' => '$DASC_2024_HABANERO_SOFTWORKS',
        ]);

        User::create([
            'username' => 'AdminHiguera',
            'email' => 'higuera@example.com',
            'password' => '$DASC_2024_HABANERO_SOFTWORKS',
        ]);
    }
}
