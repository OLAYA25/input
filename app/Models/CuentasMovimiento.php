<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CuentasMovimiento
 *
 * @property $id
 * @property $Cuenta
 * @property $CuentaEgreso
 * @property $Codigo_id
 * @property $Movimiento_id
 * @property $TipoMovimiento
 * @property $DescripcionMovimiento
 * @property $Valor
 * @property $created_at
 * @property $updated_at
 *
 * @property Codigo $codigo
 * @property Cuenta $cuenta
 * @property Cuenta $cuenta
 * @property Movimiento $movimiento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CuentasMovimiento extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Cuenta','CuentaEgreso','Codigo_id','Movimiento_id','TipoMovimiento','DescripcionMovimiento','Valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function codigo()
    {
        return $this->hasOne('App\Models\Codigo', 'id', 'Codigo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuentaE()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'CuentaEgreso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuenta()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'Cuenta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function movimiento()
    {
        return $this->hasOne('App\Models\Movimiento', 'id', 'Movimiento_id');
    }
    

}
