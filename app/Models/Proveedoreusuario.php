<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedoreusuario
 *
 * @property $id
 * @property $Usuario_id
 * @property $Proveedor_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Proveedore $proveedore
 * @property Usuariobasico $usuariobasico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedoreusuario extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Usuario_id','Proveedor_id','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'Proveedor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuariobasico()
    {
        return $this->hasOne('App\Models\Usuariobasico', 'id', 'Usuario_id');
    }
    

}
