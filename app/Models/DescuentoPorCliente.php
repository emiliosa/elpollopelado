<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescuentoPorCliente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'descuento_por_cliente';

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
    protected $fillable = ['cliente_id','descuento_id'];

    public function cliente(){
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function descuento(){
        return $this->belongsTo('\App\Models\Descuento');
    }
}
