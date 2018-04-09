<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\Direccion;

class DireccionRepository
{
    protected $direccion;

    public function __construct(Direccion $direccion)
    {
        $this->direccion = $direccion;
    }

    public function create($requestData)
    {
        return $this->direccion->create($requestData);
    }

    public function update($requestData)
    {
        return $this->direccion->update($requestData);
    }

    public function findOrFail($id)
    {
        return $this->direccion->findOrFail($id);
    }

    public function getDirecciones($cliente_id = '')
    {
        if ($cliente_id){
            $direcciones = $this->direcion->has('localidad')->has('partido')->has('provincia')->where('cliente_id', '=', $cliente_id)->with('localidad.partido.provincia')->get();
        }else{
            $direcciones = $this->direcion->paginate(15);
        }
        return $direcciones;
    }

    public function getDireccionesCombo($cliente_id)
    {
        return $this->direccion->where('cliente_id', '=', $cliente_id)->pluck('calle', 'id');
    }

}
