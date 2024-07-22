<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Codigo
 *
 * @property $id
 * @property $estado
 * @property $Codigo
 * @property $Subcodigo
 * @property $Descipcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Movimientosbasico[] $movimientosbasicos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codigo extends Model
{
    
    static $rules = [
		'Codigo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estado','Codigo','Subcodigo','Descipcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosbasicos()
    {
        return $this->hasMany('App\Models\Movimientosbasico', 'CodigoPredetermidao', 'id');
    }
    

}
