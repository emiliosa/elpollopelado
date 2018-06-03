<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
    protected $dates = [
        'deleted_at',
        'fecha_envio'
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_envio',
        'cliente_id',
        'descuento_id',
        'direccion_envio_id'
    ];

    /**
     * Set fecha_envio
     *
     * @param  string  $value
     * @return void
     */
    public function setFechaEnvioAttribute($value)
    {
        $this->attributes['fecha_envio'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString();
    }

    /**
     * Get fecha_envio
     *
     * @return date
     */
    public function getFechaEnvioAttribute()
    {
        return Carbon::parse($this->attributes['fecha_envio'])->format('d/m/Y H:i');
    }

    public function unidadesVenta()
    {
        return $this->belongsToMany('\App\Models\UnidadVenta')->withPivot('cantidad', 'precio_unitario');
    }

    public function cliente()
    {
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function descuento()
    {
        return $this->belongsTo('\App\Models\Descuento');
    }

    public function direccionEnvio()
    {
        return $this->belongsTo('\App\Models\Direccion');
    }
}
