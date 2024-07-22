<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuenta
 *
 * @property $id
 * @property $bancos_id
 * @property $descripcion
 * @property $tipo
 * @property $numero
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Banco $banco
 * @property Parametizarcaja[] $parametizarcajas
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
    protected $fillable = ['bancos_id','descripcion','tipo','numero','estado'];


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
    public function parametizarcajas()
    {
        return $this->hasMany('App\Models\Parametizarcaja', 'cuentas_id', 'id');
    }
    

}
