<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banco
 *
 * @property $id
 * @property $nombre
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuenta[] $cuentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Banco extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentas()
    {
        return $this->hasMany('App\Models\Cuenta', 'bancos_id', 'id');
    }
    

}
