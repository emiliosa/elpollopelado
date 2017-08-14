<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\Descuento;

class DescuentoRepository
{
    protected $descuento;

    public function __construct(Descuento $descuento)
    {
        $this->descuento = $descuento;
    }

    public function findOrFail($id)
    {
        return $this->descuento->findOrFail($id);
    }

    public function getDescuentosPaginate()
    {
        return Descuento::orderBy('porcentaje', 'asc')->paginate(15);
    }

    public function getDescuentos()
    {
        return Descuento::orderBy('porcentaje', 'asc')->get();
    }
    
    public function getDescuentosCombo()
    {
        return Descuento::orderBy('porcentaje', 'asc')->pluck('porcentaje', 'id');
    }

}