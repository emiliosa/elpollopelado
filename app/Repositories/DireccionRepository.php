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
            $direcciones = Direccion::where('cliente_id', '=', $cliente_id)->with('provincia','partido','localidad')->get();
        }else{
            $direcciones = Direccion::paginate(15);
        }
        return $direcciones;
    }

}