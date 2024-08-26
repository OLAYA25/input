<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $nit
 * @property $nombre
 * @property $tipo_regimen
 * @property $NRegimen
 * @property $Email
 * @property $Direccion
 * @property $Logo
 * @property $Telefono
 * @property $NombreReprent
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Bodega[] $bodegas
 * @property Factura[] $facturas
 * @property Movimiento[] $movimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit','nombre','tipo_regimen','NRegimen','Email','Direccion','Logo','Telefono','NombreReprent','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bodegas()
    {
        return $this->hasMany('App\Models\Bodega', 'empresa', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany('App\Models\Factura', 'Empresa', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'empresa_id', 'id');
    }

    public function caja()
    {
        return $this->hasOne('App\Models\Caja', 'Empresas_id', 'id');
    }
    

}
