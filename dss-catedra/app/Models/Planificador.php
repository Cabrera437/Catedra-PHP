<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planificador extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'objetivos',
        'notas',
    ];
}

