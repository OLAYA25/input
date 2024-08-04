<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $TipoPersona
 * @property $NumeroDocumento
 * @property $RazonSocial
 * @property $Telefono1
 * @property $Telefono2
 * @property $Ciudad
 * @property $Departamento
 * @property $Regimen
 * @property $Tipo
 * @property $CorreoFacturacion
 * @property $Observacion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuariobasico[] $usuariobasicos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['TipoPersona','NumeroDocumento','RazonSocial','Telefono1','Telefono2','Ciudad','Departamento','Regimen','Tipo','CorreoFacturacion','Observacion','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuariobasicos()
    {
        return $this->hasMany('App\Models\Usuariobasico', 'Proveedor_id', 'id');
    }
    

    public function movimientos()
    {
        return $this->hasMany('App\Models\Proveedore', 'OrigenProveedor_id', 'id');
    }
}
