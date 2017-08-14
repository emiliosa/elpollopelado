<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\TipoDeCliente;

class TipoDeClienteRepository
{
    protected $tipo_de_cliente;

    public function __construct(TipoDeCliente $tipo_de_cliente)
    {
        $this->tipo_de_cliente = $tipo_de_cliente;
    }

    public function findOrFail($id)
    {
        return $this->tipo_de_cliente->findOrFail($id);
    }

    public function getTiposDeCliente()
    {
        return $this->tipo_de_cliente->orderBy('descripcion', 'asc')->paginate(15);
    }

    public function getTiposDeClienteCombo()
    {
        return $this->tipo_de_cliente->orderBy('descripcion', 'asc')->pluck('descripcion', 'id');
    }

}