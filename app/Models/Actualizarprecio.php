<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Actualizarprecio
 *
 * @property $id
 * @property $Producto_id
 * @property $Impuesto_id
 * @property $Principal
 * @property $ValorBase
 * @property $Proveedor_id
 * @property $ValorPublico
 * @property $Descuento1
 * @property $Cantidad1
 * @property $Descuento2
 * @property $Cantidad2
 * @property $Descuento3
 * @property $Cantidad3
 * @property $created_at
 * @property $updated_at
 *
 * @property Impuesto $impuesto
 * @property Producto $producto
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Actualizarprecio extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Producto_id','Impuesto_id','Principal','ValorBase','Proveedor_id','ValorPublico','Descuento1','Cantidad1','Descuento2','Cantidad2','Descuento3','Cantidad3','Utilidad','UtilidadPorc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function impuesto()
    {
        return $this->hasOne('App\Models\Impuesto', 'id', 'Impuesto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'Producto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'Proveedor_id');
    }
    

}
