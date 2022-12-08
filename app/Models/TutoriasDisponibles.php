<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutoriasDisponibles extends Model
{
    use HasFactory;

    protected $fillable = [
        'temas',
        'fecha_reunion',
        'hora_reunion',
        'enlace_reunion',
        'estado',
        'capacidad_maxima',
        'materia_id',
        'tutor_id'
        // 'solicitud_id'
    ];

    protected $hidden=[ 
        'created_at',
        'updated_at',
    ];

    public function tutor(){
        return $this->hasOne(Alumnos::class,'id','tutor_id');
    }
    public function materia(){
        return $this->hasOne(TutoresMaterias::class,'id','materia_id');
    }
    // public function solicitud(){
    //     return $this->hasOne(SolicitudesTutorias::class,'id','solicitud_id');
    // }
}
