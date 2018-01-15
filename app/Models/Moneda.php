<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
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
    protected $table = 'moneda';

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
    protected $fillable = ['denominacion','codigo','simbolo'];

    public function producto(){
        return $this->hasMany('\App\Models\Producto');
    }
}
