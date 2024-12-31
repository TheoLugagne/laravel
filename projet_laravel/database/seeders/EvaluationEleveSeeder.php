<?php

namespace Database\Seeders;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationEleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();

        foreach ($evaluations as $evaluation) {
            foreach ($eleves as $eleve) {
                EvaluationEleve::create([
                    'evaluation_id' => $evaluation->id,
                    'eleve_id' => $eleve->id,
                    'note' => rand(0, 20), // Assuming the note is out of 20
                ]);
            }
        }
    }
}
