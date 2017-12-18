<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Models\Localidad;

class LocalidadRepository
{
    protected $localidad;

    public function __construct(Localidad $localidad)
    {
        $this->localidad = $localidad;
    }

    public function findOrFail($id)
    {
        return $this->localidad->findOrFail($id);
    }

    public function getLocalidades()
    {
        return Localidad::orderBy('nombre','asc')->paginate(15);
    }

    public function getLocalidadesPorPartido($partido_id)
    {
        return Localidad::where('partido_id', '=', $partido_id)->orderBy('nombre', 'asc')->get();
    }

    public function getLocalidadesCombo()
    {
        return Localidad::with('partido')->pluck('nombre','id');
    }

}