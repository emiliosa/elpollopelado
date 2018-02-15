<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 19:24
 */

namespace App\Repositories;

use App\Models\Partido;

class PartidoRepository
{
    protected $partido;

    public function __construct(Partido $partido)
    {
        $this->partido = $partido;
    }

    public function findOrFail($id)
    {
        return $this->partido->findOrFail($id);
    }

    public function getPartidos()
    {
        return \DB::table('partido')
            ->select('partido.id', 'partido.provincia_id', 'partido.nombre AS partido_nombre', 'partido.provincia_id', 'provincia.nombre AS provincia_nombre')
            ->join('provincia', 'partido.provincia_id', '=', 'provincia.id')
            ->orderBy('provincia.nombre', 'ASC')
            ->orderBy('partido.nombre', 'ASC')
            ->paginate(15);
    }

    public function getPartidosCombo()
    {
        return Partido::with('provincia')->pluck('nombre', 'id');
    }

    public function getPartidosPorProvincia($provincia_id = '')
    {
        if ($provincia_id) {
            $partidos = Partido::where('provincia_id', '=', $provincia_id)->orderBy('nombre', 'asc')->get();
        } else {
            $partidos = Partido::paginate(15);
        }
        return $partidos;
    }

    public function getPartidosPorProvinciaSearch($value)
    {
        return \DB::table('partido')
            ->select('partido.id', 'partido.provincia_id', 'partido.nombre AS partido_nombre', 'partido.provincia_id', 'provincia.nombre AS provincia_nombre')
            ->join('provincia', 'partido.provincia_id', '=', 'provincia.id')
            ->where('partido.nombre', 'like', '%' . $value . '%')
            ->orWhere('provincia.nombre', 'like', '%' . $value . '%')
            ->orderBy('provincia.nombre', 'ASC')
            ->orderBy('partido.nombre', 'ASC')
            ->paginate(15);
    }

}
