<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'numero_etudiant',
        'email',
        'image',
    ];

    public function notes()
    {
        return $this->hasMany(EvaluationEleve::class);
    }

    public function getMoyenne(): float|int
    {
        $s = 0;
        $nb_total = 0;
        foreach ($this->notes as $note) {
            $nb = $note->evaluation->coefficient * $note->evaluation->module->coefficient;
            $s += $note->note * $nb;
            $nb_total += $nb;
        }
        return round($s/$nb_total, 2);
    }
}
