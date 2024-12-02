<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    // Nombre de la tabla (opcional si el nombre coincide con el plural del modelo)
    protected $table = 'personas';

    // Define la clave primaria si no es 'id'
    protected $primaryKey = 'id_persona'; // Cambia 'id_persona' al nombre real de tu clave primaria

    // Si no usas claves primarias autoincrementales, define esto
    public $incrementing = true;

    // Si no usas los campos `created_at` y `updated_at`
    public $timestamps = true;

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'tipo_usuario',
    ];
}

