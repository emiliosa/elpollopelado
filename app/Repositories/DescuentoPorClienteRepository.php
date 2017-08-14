<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\DescuentoPorCliente;

class DescuentoPorClienteRepository
{
    protected $descuento_por_cliente;

    public function __construct(DescuentoPorCliente $descuento_por_cliente)
    {
        $this->descuento_por_cliente = $descuento_por_cliente;
    }

    public function findOrFail($id)
    {
        return $this->descuento_por_cliente->findOrFail($id);
    }
    
    public function getDescuento($cliente_id = '')
    {
        return DescuentoPorCliente::where('cliente_id', '=', $cliente_id)->get();
    }

    public function getDescuentosPorCliente($cliente_id = '')
    {
        if ($cliente_id){
            $descuentos_por_cliente = DescuentoPorCliente::where('cliente_id', '=', $cliente_id)->with('descuento')->get();
        }else{
            $descuentos_por_cliente = DescuentoPorCliente::orderBy('porcentaje', 'asc')->paginate(15);
        }
        return $descuentos_por_cliente;
    }

}