<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Support\Facades\Response;

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

    public function getDescuentosCombo($cliente_id)
    {
        return $this->cliente->find($cliente_id)->descuentos;
    }

    public function getDireccionesCombo($cliente_id)
    {
        $direccionesNew = [];
        $direcciones = $this->cliente->find($cliente_id)->direcciones;
        /*foreach ($direcciones as $direccion) {
            $denominacion =
                $direccion->localidad->partido->provincia->nombre . ', ' .
                $direccion->localidad->partido->nombre . ', ' .
                $direccion->localidad->nombre . ', ' .
                $direccion->calle . ' ' . $direccion->altura;

            $direccionesNew[] = array('id' => $direccion->id, 'text' =>  $denominacion);
        }*/
        return $direcciones;
        //return $this->cliente->where('id', '=', $cliente_id)->with('direcciones')->get();

    }

}
