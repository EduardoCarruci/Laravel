<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
   public function cliente(){

   	return $this->belongsTo('proyecto\Cliente'); // PERTENECE A UN ENTRENADOR 
   }
}