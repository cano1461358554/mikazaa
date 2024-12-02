<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 *
 * @property $id_menu
 * @property $nombre
 * @property $precio
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Menu extends Model
{
    /**
     * La clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id_menu';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_menu', 'nombre', 'precio', 'descripcion'];
}