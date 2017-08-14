<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'localidades';

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
    protected $fillable = ['partido_id','codigo_postal','nombre'];

    public function direccion(){
        return $this->hasMany('\App\Direccion');
    }

    public function partido(){
        return $this->belongsTo('\App\Partido');
    }
}
