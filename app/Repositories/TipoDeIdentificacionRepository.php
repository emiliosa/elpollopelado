<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\TipoDeIdentificacion;

class TipoDeIdentificacionRepository
{
    protected $tipo_de_identificacion;

    public function __construct(TipoDeIdentificacion $tipo_de_identificacion)
    {
        $this->tipo_de_identificacion = $tipo_de_identificacion;
    }

    public function findOrFail($id)
    {
        return $this->tipo_de_identificacion->findOrFail($id);
    }

    public function getTiposDeIdentificacion()
    {
        return $this->tipo_de_identificacion->orderBy('descripcion', 'asc')->paginate(15);
    }

    public function getTiposDeIdentificacionCombo()
    {
        return $this->tipo_de_identificacion->orderBy('descripcion', 'asc')->pluck('descripcion', 'id');
    }

}