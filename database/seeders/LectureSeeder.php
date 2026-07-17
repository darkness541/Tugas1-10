<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    public function run(): void
    {
        Lecture::create(['name' => 'Pupu Puspita', 'department_id' => 1]);
        Lecture::create(['name' => 'Parman Maryadi', 'department_id' => 1]);
        Lecture::create(['name' => 'Danu Uwais S.Pd', 'department_id' => 2]);
        Lecture::create(['name' => 'Farah Widiastuti', 'department_id' => 3]);
        Lecture::create(['name' => 'Vicky Yolanda', 'department_id' => 1]);
        Lecture::create(['name' => 'Taswir Pradipta', 'department_id' => 3]);
        Lecture::create(['name' => 'Galih Nashiruddin', 'department_id' => 3]);
        Lecture::create(['name' => 'Balidin Pranowo', 'department_id' => 2]);
        Lecture::create(['name' => 'Umay Ramadan S.T.', 'department_id' => 2]);
        Lecture::create(['name' => 'Mrs. Christelle Gaylord', 'department_id' => 1]);
    }
}