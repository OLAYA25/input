<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parametizarcaja
 *
 * @property $id
 * @property $caja_id
 * @property $bodegad_id
 * @property $cuentas_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Bodega $bodega
 * @property Caja $caja
 * @property Cuenta $cuenta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parametizarcaja extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['caja_id','bodegad_id','cuentas_id','cuentas_egre','usuario_predeterminado','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodega()
    {
        return $this->hasOne('App\Models\Bodega', 'id', 'bodegad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function caja()
    {
        return $this->hasOne('App\Models\Caja', 'id', 'caja_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuenta()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'cuentas_id');
    }
    
    public function cuentas()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'cuentas_egre');
    }
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuariobasico', 'id', 'usuario_predeterminado');
    }
    

}
