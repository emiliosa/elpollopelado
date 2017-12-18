<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'direcciones';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id', 'provincia_id', 'partido_id', 'localidad_id', 'calle', 'altura', 'piso', 'dpto', 'entrecalles'];

    public function cliente()
    {
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function provincia()
    {
        return $this->belongsTo('\App\Models\Provincia');
    }

    public function partido()
    {
        return $this->belongsTo('\App\Models\Partido');
    }

    public function localidad()
    {
        return $this->belongsTo('\App\Models\Localidad');
    }
}
