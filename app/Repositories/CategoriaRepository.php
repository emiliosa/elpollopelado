<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;
use App\Categoria;

class CategoriaRepository
{
    protected $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria= $categoria;
    }

    public function findOrFail($id)
    {
        return $this->categoria->findOrFail($id);
    }

    public function getCategorias()
    {
        return $this->categoria->orderBy('descripcion', 'asc')->paginate(15);
    }

    public function getCategoriasCombo()
    {
        return $this->categoria->orderBy('descripcion', 'asc')->pluck('descripcion','id');
    }

}