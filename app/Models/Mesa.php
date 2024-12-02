<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    // Si la columna clave primaria no es 'id', debes indicarlo
    protected $primaryKey = 'id_mesa';

    // Si no usas timestamp en la tabla, puedes deshabilitarlo
    public $timestamps = false;
}

