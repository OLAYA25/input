<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImpuestosProducto
 *
 * @property $id
 * @property $Descripcion
 * @property $productos_id
 * @property $impuestos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Impuesto $impuesto
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImpuestosProducto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','productos_id','impuestos_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function impuesto()
    {
        return $this->hasOne('App\Models\Impuesto', 'id', 'impuestos_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productos_id');
    }
    

}
