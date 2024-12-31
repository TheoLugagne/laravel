<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['title', 'coefficient', 'date', 'module_id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function notes()
    {
        return $this->hasMany(EvaluationEleve::class);
    }
}
