<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnosEnTutorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id',
        'tutoria_id',
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
}
