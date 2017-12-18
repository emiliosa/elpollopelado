<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\PedidoDetalle;

class PedidoDetalleRepository
{
    protected $pedido_detalle;

    public function __construct(PedidoDetalle $pedido_detalle)
    {
        $this->pedido_detalle = $pedido_detalle;
    }

    public function create($requestData)
    {
        return $this->pedido_detalle->create($requestData);
    }

    public function update($requestData)
    {
        return $this->pedido_detalle->update($requestData);
    }

    public function findOrFail($id)
    {
        return $this->pedido_detalle->findOrFail($id);
    }

    public function getPedidoDetalles()
    {
        return $this->pedido_detalle->paginate(15);
    }

    public function getPedidoDetallesCombo()
    {
        return $this->pedido_detalle->orderBy('fecha', 'desc')->pluck('fecha','id');
    }

}