<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
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
    protected $table = 'pedido_detalles';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = ['pedido_id','producto_id'];
    
    public function pedido(){
        return $this->belongsTo('\App\Pedido');
    }
    public function producto(){
        return $this->belongsTo('\App\Producto');
    }
}
