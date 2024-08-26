<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caja
 *
 * @property $id
 * @property $Descripcion
 * @property $estado
 * @property $numero
 * @property $created_at
 * @property $updated_at
 *
 * @property Movimiento[] $movimientos
 * @property Parametizarcaja[] $parametizarcajas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caja extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','estado','numero','Empresas_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'Caja_id', 'id');
    }
    public function empresas()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'Empresas_id');
    }
   
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parametizarcajas()
    {
        return $this->hasMany('App\Models\Parametizarcaja', 'caja_id', 'id');
    }
    

}
