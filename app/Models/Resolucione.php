<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resolucione
 *
 * @property $id
 * @property $Movimientos_id
 * @property $Prefijo
 * @property $DesdeNumero
 * @property $HastaNumero
 * @property $FechaInicio
 * @property $FechaFin
 * @property $Vigencia
 * @property $created_at
 * @property $upated_at
 *
 * @property Movimientosbasico $movimientosbasico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Resolucione extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Movimientos_id','estado','Prefijo','DesdeNumero','HastaNumero','FechaInicio','FechaFin','Vigencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function movimientosbasico()
    {
        return $this->hasOne('App\Models\Movimientosbasico', 'id', 'Movimientos_id');
    }
    

}
