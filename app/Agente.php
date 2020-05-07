<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
	protected $table = "agentes";

	protected $fillable= [
   		'id',
   		'nombre_agente',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registros'); 
    }
}
