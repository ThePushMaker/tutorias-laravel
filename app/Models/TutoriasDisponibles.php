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

    protected $hidden=[ 
        'created_at',
        'updated_at',
    ];

    public function tutor(){
        return $this->hasOne(Alumnos::class,'id','tutor_id');
    }
    public function materia(){
        return $this->hasOne(Materias::class,'id','materia_id');
    }
    public function solicitud(){
        return $this->hasOne(SolicitudesTutorias::class,'id','solicitud_id');
    }
}
