<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = Module::all();

        foreach ($modules as $module) {
            for ($i = 1; $i <= 3; $i++) {
                Evaluation::create([
                    'title' => "Evaluation $i for Module {$module->nom}",
                    'coefficient' => rand(1, 5),
                    'date' => now()->addDays(rand(1, 30)),
                    'module_id' => $module->id,
                ]);
            }
        }
    }
}
