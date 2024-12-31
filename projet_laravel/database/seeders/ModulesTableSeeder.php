<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            ['code' => 'MATH101', 'nom' => 'Mathematics', 'coefficient' => 3],
            ['code' => 'PHYS101', 'nom' => 'Physics', 'coefficient' => 4],
            ['code' => 'CHEM101', 'nom' => 'Chemistry', 'coefficient' => 3],
            ['code' => 'BIO101', 'nom' => 'Biology', 'coefficient' => 2],
            ['code' => 'CS101', 'nom' => 'Computer Science', 'coefficient' => 5],
            ['code' => 'HIST101', 'nom' => 'History', 'coefficient' => 2],
            ['code' => 'GEO101', 'nom' => 'Geography', 'coefficient' => 2],
            ['code' => 'LIT101', 'nom' => 'Literature', 'coefficient' => 3],
            ['code' => 'ART101', 'nom' => 'Art', 'coefficient' => 1],
            ['code' => 'MUS101', 'nom' => 'Music', 'coefficient' => 1],
        ];

        DB::table('modules')->insert($modules);
    }
}
