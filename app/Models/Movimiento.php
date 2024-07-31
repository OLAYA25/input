<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimiento
 *
 * @property $id
 * @property $TipoMovimiento_id
 * @property $OrigenBodega_id
 * @property $OrigenProveedor_id
 * @property $UsuarioDestino_id
 * @property $DestinoBodega_id
 * @property $users_id
 * @property $Caja_id
 * @property $Cuenta_id
 * @property $ValorImpuesto
 * @property $ValorSinImpuesto
 * @property $Total
 * @property $estado
 * @property $created_at
 * @property $update_at
 *
 * @property Bodega $bodega
 * @property Bodega $bodega
 * @property Caja $caja
 * @property Cuenta $cuenta
 * @property Movimientosbasico $movimientosbasico
 * @property Movimientosdatallado[] $movimientosdatallados
 * @property User $user
 * @property Usuariobasico $usuariobasico
 * @property Usuariobasico $usuariobasico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movimiento extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['TipoMovimiento_id','OrigenBodega_id','OrigenProveedor_id','UsuarioDestino_id','DestinoBodega_id','users_id','Caja_id','Cuenta_id','ValorImpuesto','ValorSinImpuesto','Total','estado','update_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodega()
    {
        return $this->hasOne('App\Models\Bodega', 'id', 'OrigenBodega_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodegas()
    {
        return $this->hasOne('App\Models\Bodega', 'id', 'DestinoBodega_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function caja()
    {
        return $this->hasOne('App\Models\Caja', 'id', 'Caja_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuenta()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'Cuenta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function movimientosbasico()
    {
        return $this->hasOne('App\Models\Movimientosbasico', 'id', 'TipoMovimiento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosdatallados()
    {
        return $this->hasMany('App\Models\Movimientosdatallado', 'Movimientos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuariobasico()
    {
        return $this->hasOne('App\Models\Usuariobasico', 'id', 'UsuarioDestino_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuariobasicos()
    {
        return $this->hasOne('App\Models\Usuariobasico', 'id', 'OrigenProveedor_id');
    }
    

}
