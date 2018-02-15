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
        return \DB::table('localidad')
            ->select('localidad.id', 'localidad.partido_id', 'localidad.nombre AS localidad_nombre', 'localidad.codigo_postal', 'partido.nombre AS partido_nombre', 'partido.provincia_id', 'provincia.nombre AS provincia_nombre')
            ->join('partido', 'localidad.partido_id', '=', 'partido.id')
            ->join('provincia', 'partido.provincia_id', '=', 'provincia.id')
            ->orderBy('provincia.nombre', 'ASC')
            ->orderBy('partido.nombre', 'ASC')
            ->orderBy('localidad.nombre', 'ASC')
            ->paginate(15);
    }

    public function getLocalidadesPorPartido($partido_id)
    {
        return Localidad::where('partido_id', '=', $partido_id)->orderBy('nombre', 'asc')->get();
    }

    public function getLocalidadesCombo()
    {
        return Localidad::with('partido')->pluck('nombre', 'id');
    }

    public function getLocalidadesSearch($value)
    {
        return \DB::table('localidad')
            ->select('localidad.id', 'localidad.partido_id', 'localidad.nombre AS localidad_nombre', 'localidad.codigo_postal', 'partido.nombre AS partido_nombre', 'partido.provincia_id', 'provincia.nombre AS provincia_nombre')
            ->join('partido', 'localidad.partido_id', '=', 'partido.id')
            ->join('provincia', 'partido.provincia_id', '=', 'provincia.id')
            ->where('localidad.nombre', 'like', '%' . $value . '%')
            ->orWhere('partido.nombre', 'like', '%' . $value . '%')
            ->orWhere('provincia.nombre', 'like', '%' . $value . '%')
            ->orderBy('provincia.nombre', 'ASC')
            ->orderBy('partido.nombre', 'ASC')
            ->orderBy('localidad.nombre', 'ASC')
            ->paginate(15);
    }
}
