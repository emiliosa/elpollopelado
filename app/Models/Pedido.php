<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedido';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_envio','cliente_id','descuento_id','direccion_envio_id'];

    public function pedidoDetalle(){
        return $this->hasMany('\App\Models\PedidoDetalle');
    }

    public function cliente(){
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function descuento(){
        return $this->belongsTo('\App\Models\Descuento');
    }

    public function direccionEnvio(){
        return $this->belongsTo('\App\Models\Direccion');
    }
}
