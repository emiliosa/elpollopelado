<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direccion extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'direccion';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id', 'localidad_id', 'calle', 'altura', 'piso', 'dpto', 'entrecalles'];

    public function clientes()
    {
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function localidad()
    {
        return $this->belongsTo('\App\Models\Localidad');
    }
}
