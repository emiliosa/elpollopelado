<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadVenta extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'unidad_venta';

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
    protected $fillable = [
        'producto_precio_id',
        'codigo'
    ];

    public function productoPrecio()
    {
        //return $this->hasOne('\App\Models\ProductoPrecio');
        return $this->belongsTo('\App\Models\ProductoPrecio');
    }

    public function pedidos()
    {
        return $this->belongsToMany('\App\Models\Pedido');
    }

}
