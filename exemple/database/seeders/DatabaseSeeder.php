<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(50)->create();

        Employer::factory(50)->create();

        Job::factory(100)->create();
    }
}
