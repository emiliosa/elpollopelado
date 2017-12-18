<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\Pedido;

class PedidoRepository
{
    protected $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function create($requestData)
    {
        return $this->pedido->create($requestData);
    }

    public function update($requestData)
    {
        return $this->pedido->update($requestData);
    }

    public function findOrFail($id)
    {
        return $this->pedido->findOrFail($id);
    }

    public function getPedidos()
    {
        return $this->pedido->orderBy('fecha', 'desc')->paginate(15);
    }

    public function getPedidosCombo()
    {
        return $this->pedido->orderBy('fecha', 'desc')->pluck('fecha','id');
    }

}