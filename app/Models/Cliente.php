<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Cliente extends Model
{
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
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_identificacion_id', 'identificacion', 'tipo_cliente_id', 'razon_social', 'nombre', 'apellido', 'email', 'telefono_celular', 'telefono_fijo'];

    protected $searchable = [
        'columns' => [
            'clientes.identificacion' => 10,
            'clientes.razon_social' => 10,
            'clientes.nombre' => 5,
            'clientes.apellido' => 2,
            'clientes.email' => 2,
        ],
    ];

    public function pedido()
    {
        return $this->hasMany('\App\Models\Pedido');
    }

    public function direccionPorCliente()
    {
        return $this->hasMany('\App\Models\DireccionPorCliente');
    }

    public function descuentoPorCliente()
    {
        return $this->hasMany('\App\Models\DescuentoPorCliente');
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
