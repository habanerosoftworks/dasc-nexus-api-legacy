<?php

namespace Database\Seeders;

use App\Models\SessionDasc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionDascSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SessionDasc::factory()
            ->count(10)
            ->create();
    }
}
