<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

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
    protected $fillable = ['fecha_envio','cliente_id','descuento_id','direccion_envio_id'];

    public function pedidoDetalle(){
        return $this->hasMany('\App\PedidoDetalle');
    }

    public function cliente(){
        return $this->belongsTo('\App\Cliente');
    }

    public function descuento(){
        return $this->belongsTo('\App\Descuento');
    }

    public function direccionEnvio(){
        return $this->belongsTo('\App\Direccion');
    }
}
