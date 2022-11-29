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
}
