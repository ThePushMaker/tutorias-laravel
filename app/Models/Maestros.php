<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestros extends Model
{
    use HasFactory;

    protected $fillable = [//los campos que se va a permitir que se asignen masivamente
        'nombre',
        'correo',
        'contraseña',
        'estado_cuenta'
    ];
    
    protected $hidden=[ //los datos que no queremos que se envíen por el controlador de la api
        'created_at',
        'updated_at',
    ];
}
