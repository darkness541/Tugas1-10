<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create(['name' => 'Teknik Informatika']);
        Department::create(['name' => 'Sistem Informasi']);
        Department::create(['name' => 'Teknik Elektro']);
        Department::create(['name' => 'Teknik Sipil']);
        Department::create(['name' => 'Manajemen']);
        Department::create(['name' => 'Akuntansi']);
    }
}