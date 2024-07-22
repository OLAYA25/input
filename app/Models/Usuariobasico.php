<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuariobasico
 *
 * @property $id
 * @property $TipoDocumento
 * @property $NDocumento
 * @property $Nombre1
 * @property $Nombre2
 * @property $Apellido1
 * @property $Apeelido2
 * @property $Telefono
 * @property $Email
 * @property $Checkproveedor
 * @property $estado
 * @property $FechaNacimiento
 * @property $Genero
 * @property $TelefonoFijo
 * @property $TelefonoMovil
 * @property $Sexo
 * @property $Empleado_id
 * @property $Proveedor_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Movimiento[] $movimientos
 * @property Movimientosbodega[] $movimientosbodegas
 * @property Preciosproducto[] $preciosproductos
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuariobasico extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['TipoDocumento','NDocumento','Nombre1','Nombre2','Apellido1','Apeelido2','Telefono','Email','Checkproveedor','estado','FechaNacimiento','Genero','TelefonoFijo','TelefonoMovil','Sexo','Empleado_id','Proveedor_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'Empleado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'usuariobasico_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosbodegas()
    {
        return $this->hasMany('App\Models\Movimientosbodega', 'Proveedor', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preciosproductos()
    {
        return $this->hasMany('App\Models\Preciosproducto', 'Proveedor', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'Proveedor_id');
    }
    

}
