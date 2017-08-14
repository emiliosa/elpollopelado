<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionPorCliente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'direcciones_por_cliente';

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
    protected $fillable = ['cliente_id','direccion_id'];

    public function direccion(){
        return $this->belongsTo('\App\Direccion');
    }

    public function cliente(){
        return $this->belongsTo('\App\Cliente');
    }
}
