<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\Models\Provincia;
use Illuminate\Support\Facades\Response;

class ProvinciaRepository
{
    protected $provincia;

    public function __construct(Provincia $provincia)
    {
        $this->provincia = $provincia;
    }

    public function findOrFail($id)
    {
        return $this->provincia->findOrFail($id);
    }

    public function getProvincias()
    {
        return $this->provincia->paginate(15);
    }

    public function getProvinciasCombo()
    {
        return $this->provincia->orderBy('nombre', 'asc')->pluck('nombre', 'id');
    }

    public function getProvinciasJson()
    {
        $provincias = $this->provincia->orderBy('nombre', 'asc')->get();
        return Response::json($provincias);
    }

    public function getProvinciasSearch($value)
    {
        return $this->provincia
            ->where('nombre', 'like', '%' . $value . '%')
            ->orderBy('nombre', 'asc')
            ->paginate(15);
    }

}
