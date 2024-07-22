<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bodega
 *
 * @property $id
 * @property $Descripcion
 * @property $empresa
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Bodegasproducto[] $bodegasproductos
 * @property Empresa $empresa
 * @property Movimientosbodega[] $movimientosbodegas
 * @property Preciosproducto[] $preciosproductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bodega extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','empresa','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bodegasproductos()
    {
        return $this->hasMany('App\Models\Bodegasproducto', 'Bodega', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresas()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosbodegas()
    {
        return $this->hasMany('App\Models\Movimientosbodega', 'Bodega', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preciosproductos()
    {
        return $this->hasMany('App\Models\Preciosproducto', 'Proveedor', 'id');
    }
    

}
