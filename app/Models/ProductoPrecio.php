<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoPrecio extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'producto_precio';

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
    protected $dates = [
        'created_at',
        'deleted_at'
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produto_id',
        'precio_unitario'
    ];

    /**
     * Get precio_unitario
     *
     * @return float
     */
    public function getPrecioUnitarioAttribute() {
        return $this->attributes['precio_unitario'];
    }

    /**
     * Get precio_unitario formatted
     *
     * @return float
     */
    public function getPrecioUnitarioFormatted() {
        return number_format($this->attributes['precio_unitario'], 2, '.', ' ');
    }

    public function producto()
    {
        return $this->belongsTo('\App\Models\Producto', 'producto_id');
    }

    public function unidadVenta()
    {
        //return $this->belongsTo('\App\Models\UnidadVenta');
        return $this->hasOne('\App\Models\UnidadVenta');
    }
}
