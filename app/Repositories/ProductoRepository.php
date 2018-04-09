<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\Producto;

class ProductoRepository
{
    protected $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function create($requestData)
    {
        return $this->producto->create($requestData);
    }

    public function update($requestData)
    {
        return $this->producto->update($requestData);
    }

    public function findOrFail($id)
    {
        return $this->producto->findOrFail($id);
    }

    public function getProductos()
    {
        return $this->producto->has('categoria')->has('moneda')->orderBy('descripcion', 'asc')->with('categoria','moneda')->has('categoria')->paginate(15);
    }

    public function getProductosCombo()
    {
        return $this->producto->orderBy('descripcion', 'asc')->pluck('descripcion', 'id');
    }

    public function getEstados()
    {
        return $this->producto->estado();
    }

}
