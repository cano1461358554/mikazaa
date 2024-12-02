<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; // Nombre de la tabla

    protected $primaryKey = 'id_cliente'; // Nombre de la clave primaria

    public $incrementing = true; // Si la clave primaria es autoincremental
    public $timestamps = true; // Si la tabla tiene columnas created_at y updated_at

    // Columnas que se pueden asignar masivamente
    protected $fillable = [
        'telefono',
    ];
}
