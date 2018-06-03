<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    public $timestamps = false;

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
    protected $fillable = [
        'codigo',
        'categoria_id',
        'descripcion',
        'observaciones',
        'moneda_id',
        'stock',
        'imagen'
    ];

    public function categoria()
    {
        return $this->belongsTo('\App\Models\Categoria', 'categoria_id');
    }

    public function moneda()
    {
        return $this->belongsTo('\App\Models\Moneda', 'moneda_id');
    }

    public function productoPrecio()
    {
        return $this->hasMany('\App\Models\ProductoPrecio');
    }

    public function estado()
    {
        return array('Activo','Inactivo');
    }
}
