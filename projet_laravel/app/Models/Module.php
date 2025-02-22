<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nom',
        'coefficient'
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
