<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ElevesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $eleves = [];

        for ($i = 1; $i <= 50; $i++) {
            $eleves[] = [
                'nom' => 'Nom' . $i,
                'prenom' => 'Prenom' . $i,
                'date_naissance' => '2000-01-01',
                'numero_etudiant' => Str::random(6) . $i,
                'email' => 'eleve' . $i . '@example.com',
                'image' => null,
            ];
        }

        DB::table('eleves')->insert($eleves);
    }
}
