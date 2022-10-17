<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $fillable = [//los campos que se va a permitir que se asignen masivamente
        'nombre',
        'correo',
        'contraseña',
        'rango',
        'cuenta_activa',
        'semestre',
        'numero_control',
    ];
    
    protected $hidden=[ //los datos que no queremos que se envíen por el controlador de la api
        'created_at',
        'updated_at',
    ];

    

    // public function ciudad(){
    //     return $this->hasOne(City::class,'id','city');
    // }

    // public function pets(){
    //     return $this->hasMany(Pet::class,'client_id','id');
    // }
}
