<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadDeVenta extends Model
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
    protected $table = 'unidades_de_venta';

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
    protected $fillable = ['producto_id','nro_serie','estado'];

    public function estado(){
        return array('Disponible','No disponible');
    }

    public function producto(){
        return $this->belongsTo('\App\Models\Producto');
    }
    
    public function pedidoDetalle(){
        return $this->hasMany('\App\Models\PedidoDetalle');
    }
}
