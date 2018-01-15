<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
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
    protected $table = 'partido';

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
    protected $fillable = ['provincia_id','nombre'];

    public function localidad(){
        return $this->hasMany('\App\Models\Localidad');
    }

    public function provincia(){
        return $this->belongsTo('\App\Models\Provincia');
    }

}
