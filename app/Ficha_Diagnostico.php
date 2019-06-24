<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Ficha_Diagnostico extends Model
{
       //
       protected $table='ficha_diagnostico';

       protected $primaryKey='idficha_diagnostico'; // campo llave primaria
   
       public $timestamps =false;
   
       //especificar los campos que se van ha almacenar en la BD
   
       protected $fillable=[           
         
           'enfermedad',
           'tipo',
           'diagnostico',
           'recomendaciones',
           'intervencion',
           'orden',
           'idorden'
          
       ];
       //los campos q no queremos q no se asignen al modelo
       protected $guarded=[];
   
}
