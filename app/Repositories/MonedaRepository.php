<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/06/17
 * Time: 20:19
 */

namespace App\Repositories;

use App\Moneda;

class MonedaRepository
{
    protected $moneda;

    public function __construct(Moneda $moneda)
    {
        $this->moneda = $moneda;
    }

    public function findOrFail($id)
    {
        return $this->moneda->findOrFail($id);
    }

    public function getMonedas()
    {
        return $this->moneda->orderBy('denominacion', 'asc')->paginate(15);
    }

    public function getMonedasCombo()
    {
        return $this->moneda->orderBy('denominacion', 'asc')->pluck('denominacion','id');
    }

}