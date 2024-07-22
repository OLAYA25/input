<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Impuesto
 *
 * @property $id
 * @property $Descripcion
 * @property $Valor
 * @property $FechaVigencia
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Actualizarprecio[] $actualizarprecios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Impuesto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','Valor','FechaVigencia','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actualizarprecios()
    {
        return $this->hasMany('App\Models\Actualizarprecio', 'Impuesto_id', 'id');
    }
    

}
