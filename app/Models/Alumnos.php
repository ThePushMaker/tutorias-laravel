<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
        'rango',
        'cuenta_activa',
        'semestre',
        'numero_control',
    ];

    // public function ciudad(){
    //     return $this->hasOne(City::class,'id','city');
    // }

    // public function pets(){
    //     return $this->hasMany(Pet::class,'client_id','id');
    // }
}
