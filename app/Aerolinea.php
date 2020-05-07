<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    protected $table = "aerolineas";

	protected $fillable= [
   		'id',
   		'nombre_aerolinea',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registros'); 
    }
}
