<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuenta
 *
 * @property $id
 * @property $bancos_id
 * @property $usuario_id
 * @property $descripcion
 * @property $tipo
 * @property $numero
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Banco $banco
 * @property Movimiento[] $movimientos
 * @property Movimiento[] $movimientos
 * @property Movimiento[] $movimientos
 * @property Parametizarcaja[] $parametizarcajas
 * @property Parametizarcaja[] $parametizarcajas
 * @property Usuariobasico $usuariobasico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuenta extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bancos_id','usuario_id','descripcion','tipo','numero','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function banco()
    {
        return $this->hasOne('App\Models\Banco', 'id', 'bancos_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'Cuenta_Entrada', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosE()
    {
        return $this->hasMany('App\Models\Movimiento', 'Cuenta_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosS()
    {
        return $this->hasMany('App\Models\Movimiento', 'Cuenta_Salida', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parametizarcajas()
    {
        return $this->hasMany('App\Models\Parametizarcaja', 'cuentas_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parametizarcajasE()
    {
        return $this->hasMany('App\Models\Parametizarcaja', 'cuentas_egre', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuariobasico()
    {
        return $this->hasOne('App\Models\Usuariobasico', 'id', 'usuario_id');
    }
    

}
