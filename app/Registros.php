<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    protected $table = "registros";

	protected $fillable= [
   		'id',
   		'id_aerolinea',
   		'guia',
   		'fecha_asignacion',
   		'id_agente',
   		'fact_sci',
   		'periodo_cass',
   		'ref_sci',
   		'id_usuario',
   		'created_at',
   		'updated_at',

   	];

    public function aerolinea(){

    	return $this->belongsTo('App\Aerolinea','id_aerolinea'); 
    }

    public function agente(){

    	return $this->belongsTo('App\Agente','id_agente'); 
    }
}
