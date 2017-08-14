<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 19:24
 */

namespace App\Repositories;
use App\Partido;

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
        return Partido::with('provincia')->get();
    }

    public function getPartidosCombo()
    {
        return Partido::with('provincia')->pluck('nombre','id');
    }

    public function getPartidosPorProvincia($provincia_id='')
    {
        if ($provincia_id){
            $partidos = Partido::where('provincia_id', '=', $provincia_id)->orderBy('nombre', 'asc')->get();
        }else{
            $partidos = Partido::paginate(15);
        }
        return $partidos;
    }

}