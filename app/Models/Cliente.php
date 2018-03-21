<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Cliente extends Model
{
    use SoftDeletes;
    use SearchableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cliente';

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
    protected $fillable = ['tipo_identificacion_id', 'identificacion', 'tipo_cliente_id', 'razon_social', 'nombre', 'apellido', 'email', 'telefono_celular', 'telefono_fijo'];

    protected $searchable = [
        'columns' => [
            'clientes.identificacion' => 10,
            'clientes.razon_social'   => 10,
            'clientes.nombre'         => 5,
            'clientes.apellido'       => 2,
            'clientes.email'          => 2,
        ],
    ];

    public function pedido()
    {
        return $this->hasMany('\App\Models\Pedido');
    }

    public function direcciones()
    {
        return $this->hasMany('\App\Models\Direccion');
    }

    public function descuentos()
    {
        return $this->belongsToMany('\App\Models\Descuento');
    }

    public function tipoCliente()
    {
        return $this->belongsTo('\App\Models\TipoDeCliente');
    }

    public function tipoIdentificacion()
    {
        return $this->belongsTo('\App\Models\TipoDeIdentificacion');
    }

}
