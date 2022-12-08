<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutoresMaterias extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id',
        'materia_id',
    ];

    protected $hidden=[ 
        'created_at',
        'updated_at',
    ];

    public function materia(){
        return $this->hasOne(Materias::class,'id','materia_id');
    }
    public function tutor(){
        return $this->hasOne(Alumnos::class,'id','tutor_id');
    }
}
