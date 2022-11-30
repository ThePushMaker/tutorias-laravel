<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutoriasDisponibles extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc_temas_impartir',
        'horario_pref_sesiones',
        'capacidad_maxima',
        'estado',
        'materia_id',
        'tutor_id',
        'solicitud_id'
    ];
}
