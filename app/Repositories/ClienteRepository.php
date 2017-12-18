<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\Cliente;

class ClienteRepository
{
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente= $cliente;
    }

    public function create($requestData)
    {
        return $this->cliente->create($requestData);
    }

    public function update($requestData)
    {
        return $this->cliente->update($requestData);
    }

    public function findOrFail($id)
    {
        return $this->cliente->findOrFail($id);
    }

    public function getClientes()
    {
        return $this->cliente->orderBy('razon_social', 'asc')->paginate(15);
    }

    public function getClientesCombo()
    {
        return $this->cliente->orderBy('razon_social', 'asc')->pluck('razon_social','id');
    }

}