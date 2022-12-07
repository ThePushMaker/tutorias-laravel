<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $hidden=[ //los datos que no queremos que se envíen por el controlador de la api
        'created_at',
        'updated_at',
    ];
}
