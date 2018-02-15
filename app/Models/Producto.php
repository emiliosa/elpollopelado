<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'producto';

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
    protected $fillable = ['codigo','categoria_id','descripcion', 'observaciones', 'moneda_id','precio_unitario','stock', 'imagen'];

    public function categoria(){
        return $this->belongsTo('\App\Models\Categoria');
    }

    public function moneda(){
        return $this->belongsTo('\App\Models\Moneda');
    }

    public function unidadDeVenta(){
        return $this->hasMany('\App\Models\UnidadDeVenta');
    }

    public function estado(){
        return array('Activo','Inactivo');
    }
}
