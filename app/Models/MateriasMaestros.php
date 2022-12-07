<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriasMaestros extends Model
{
    use HasFactory;

    protected $fillable = [
        'maestro_id',
        'materia_id',
    ];

    protected $hidden=[ 
        'created_at',
        'updated_at',
    ];

    public function materia(){
        return $this->hasOne(Materias::class,'id','materia_id');
    }
    public function maestro(){
        return $this->hasOne(Maestros::class,'id','materia_id');
    }
}
