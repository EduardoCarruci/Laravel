<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    // puede pertenecer a muchos

    /*
    1- modelo a relacionar
    2- nombre de la tabla pivote
    3- llave foranea del modelo que realiza la relacion
    4-llave foranea del modelo a relacionar
    */


    public function hijos(){
        return $this->belongsToMany(Hijo::class) ; 
    }



}
