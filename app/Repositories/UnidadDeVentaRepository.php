<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\UnidadDeVenta;

class UnidadDeVentaRepository
{
    protected $unidad_de_venta;

    public function __construct(UnidadDeVenta $unidad_de_venta)
    {
        $this->unidad_de_venta= $unidad_de_venta;
    }

    public function create($requestData)
    {
        return $this->unidad_de_venta->create($requestData);
    }

    public function update($requestData)
    {
        return $this->unidad_de_venta->update($requestData);
    }

    public function findOrFail($id)
    {
        return $this->unidad_de_venta->findOrFail($id);
    }

    public function getUnidadesDeVenta()
    {
        return $this->unidad_de_venta->paginate(15);
    }

    public function getUnidadesDeVentaCombo()
    {
        return $this->unidad_de_venta->pluck('nro_serie','id');
    }

    public function getEstados()
    {
        return $this->unidad_de_venta->estado();
    }

}