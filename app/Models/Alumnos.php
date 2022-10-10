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
        'rango_tutor',
        'cuenta_activa',
        'semestre',
        'numero_control',
        'descripcion',
    ];
}
