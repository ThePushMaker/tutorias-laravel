<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_reunion',
        'hora_reunion',
        'enlace_reunion',
        'mensaje',
        'tutoria_id',
        'alumno_id',
        'tutor_id',
        'materia_id'
    ];

    protected $hidden=[ 
        'created_at',
        'updated_at',
    ];

    public function tutoria(){
        return $this->hasOne(TutoriasDisponibles::class,'id','tutoria_id');
    }
    public function alumno(){
        return $this->hasOne(Alumnos::class,'id','alumno_id');
    }
    public function tutor(){
        return $this->hasOne(Alumnos::class,'id','tutor_id');
    }
    public function materia(){
        return $this->hasOne(Materias::class,'id','materia_id');
    }
}
