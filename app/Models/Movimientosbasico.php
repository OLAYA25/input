<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimientosbasico
 *
 * @property $id
 * @property $Codigo
 * @property $Descripcion
 * @property $Descuento
 * @property $Agregar
 * @property $Alerta
 * @property $updated_at
 * @property $created_at
 *
 * @property Movimientosbodega[] $movimientosbodegas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movimientosbasico extends Model
{
    
    static $rules = [
        'Codigo'=>'required|unique:movimientosbasicos,Codigo',
        'Descripcion'=>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Codigo','Descripcion','Descuento', 'Activo'	 ,'Pasivo'	 ,'Patrimonio'	 ,'Ingresos'	 ,'Gastos'	 , 'CostoVenta'	,  'CostoPO'	,  'Deudoras'	  ,'Acreedoras'
    ,'Agregar','Alerta','CodigoPredetermidao','CajaPredeterminada','OrigenBodega','DestinoBodega','UsuarioOrigen','UsuarioDestino','TituloPiePagina','PiePagina','CuentaOrigen','CuentaSalida'];

    public function codigos()
    {
        return $this->hasMany('App\Models\Codigos', 'CodigoPredetermidao', 'id');
    }
    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosbodegas()
    {
        return $this->hasMany('App\Models\Movimientosbodega', 'CodigosMovimientos', 'id');
    }
    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'TipoMovimiento_id', 'id');
    }
    public function cajas()
    {
        return $this->hasMany('App\Models\Caja', 'CajaPredeterminada', 'id');
    }


}
