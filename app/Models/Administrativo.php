<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $table = 'administrativos'; // Nombre de la tabla
    protected $primaryKey = 'id_administrativo'; // Clave primaria personalizada
    public $incrementing = false; // Si no es autoincremental
    protected $keyType = 'string'; // Tipo de clave primaria (string si no es entero)

    protected $fillable = [
        'id_administrativo',
        'departamento',
    ];
}
