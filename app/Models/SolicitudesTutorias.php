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
    public function maestro(){
        return $this->hasOne(Maestros::class,'id','materia_id');
    }
}
