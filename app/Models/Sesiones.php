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
        'tutoria_id'
    ];
}
