<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bodegasproducto
 *
 * @property $id
 * @property $Producto
 * @property $Cantidad
 * @property $Bodega
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Bodega $bodega
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bodegasproducto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Producto','Cantidad','Bodega','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodega()
    {
        return $this->hasOne('App\Models\Bodega', 'id', 'Bodega');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'Producto');
    }
    

}
