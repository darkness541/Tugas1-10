<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            StudentSeeder::class,
            LectureSeeder::class,
            OrganizationSeeder::class,   // ← Tambahkan ini
        ]);
    }
}