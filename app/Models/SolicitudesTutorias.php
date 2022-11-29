<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesTutorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
        'promedio_obtenido',
        'estado',
        'materia_id',
        'tutor_id',
        'maestro_id'
    ];
}
