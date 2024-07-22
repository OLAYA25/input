<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Codigoalterno
 *
 * @property $id
 * @property $Descripcion
 * @property $estado
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 * @property $producto_id
 *
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codigoalterno extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','estado','cantidad','producto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
    

}
