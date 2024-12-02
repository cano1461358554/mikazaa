<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservacione
 *
 * @property $id_reservacion
 * @property $fecha_hora
 * @property $cantidad_personas
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reservacione extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_reservacion', 'fecha_hora', 'cantidad_personas'];



}
