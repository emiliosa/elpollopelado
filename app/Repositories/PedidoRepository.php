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

    public function getPedidosSearch($value)
    {
        return \DB::table('pedido')
            ->select('pedido.id', 'pedido.cliente_id', 'pedido.fecha_envio', 'pedido.descuento_id', 'pedido.direccion_envio_id', 'cliente.nombre', 'cliente.apellido')
            ->join('cliente', 'pedido.cliente_id', '=', 'cliente.id')
            ->where('cliente.nombre', 'like', '%' . $value . '%')
            ->orWhere('cliente.apellido', 'like', '%' . $value . '%')
            ->orWhere('pedido.fecha_envio', '=', $value)
            ->orWhere('cliente.apellido', 'like', '%' . $value . '%')
            ->orWhere('cliente.apellido', 'like', '%' . $value . '%')
            ->orderBy('pedido.fecha_envio', 'ASC')
            ->orderBy('cliente.nombre', 'ASC')
            ->orderBy('cliente.apellido', 'ASC')
            ->paginate(15);
    }

}