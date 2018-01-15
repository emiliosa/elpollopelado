<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDeCliente extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_de_cliente';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion'];
    
    public function cliente(){
        return $this->hasMany('\App\Models\Cliente');
    }
}
