<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        Organization::create([
            'name' => 'CV Pradana (Persero) Tbk',
            'company' => 'Puti Paramita Lestari M.TI.',
            'lecture_id' => 1
        ]);

        Organization::create([
            'name' => 'UD Putra Kusumo (Persero) Tbk',
            'company' => 'Siti Wastuti',
            'lecture_id' => 2
        ]);

        Organization::create([
            'name' => 'CV Wacana Agustina',
            'company' => 'Yessi Yuliana Widiastuti',
            'lecture_id' => 3
        ]);
    }
}