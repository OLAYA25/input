<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $Descripcion
 * @property $Imagen
 * @property $Estado
 * @property $Existencias
 * @property $Stock_Max
 * @property $Stock_Min
 * @property $VenderNegativos
 * @property $DescInventario
 * @property $NumeroSerial
 * @property $Talla
 * @property $Largor
 * @property $Alto
 * @property $Ancho
 * @property $Observaciones
 * @property $familia1_id
 * @property $familia2_id
 * @property $familia3_id
 * @property $unidadmedida_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Actualizarprecio[] $actualizarprecios
 * @property Bodegasproducto[] $bodegasproductos
 * @property Codigoalterno[] $codigoalternos
 * @property Detallefactura[] $detallefacturas
 * @property Entradaproducto[] $entradaproductos
 * @property Familia1 $familia1
 * @property Familia2 $familia2
 * @property Familia3 $familia3
 * @property Preciosproducto[] $preciosproductos
 * @property Unidadmedida $unidadmedida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','Imagen','Estado','Existencias','Stock_Max','Stock_Min','VenderNegativos','DescInventario','NumeroSerial','Talla','Largor','Alto','Ancho','Observaciones','familia1_id','familia2_id','familia3_id','unidadmedida_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actualizarprecios()
    {
        return $this->hasMany('App\Models\Actualizarprecio', 'Producto_id', 'id');
    }

    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bodegasproductos()
    {
        return $this->hasMany('App\Models\Bodegasproducto', 'Producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function codigoalternos()
    {
        return $this->hasMany('App\Models\Codigoalterno', 'producto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallefacturas()
    {
        return $this->hasMany('App\Models\Detallefactura', 'Producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradaproductos()
    {
        return $this->hasMany('App\Models\Entradaproducto', 'idProducto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familia1()
    {
        return $this->hasOne('App\Models\Familia1', 'id', 'familia1_id');
    }

    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familia2()
    {
        return $this->hasOne('App\Models\Familia2', 'id', 'familia2_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familia3()
    {
        return $this->hasOne('App\Models\Familia3', 'id', 'familia3_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preciosproductos()
    {
        return $this->hasMany('App\Models\Preciosproducto', 'idProducto', 'id');
    }
    
    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimetosdatallado', 'Impuesto_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidadmedida()
    {
        return $this->hasOne('App\Models\Unidadmedida', 'id', 'unidadmedida_id');
    }
    

}
