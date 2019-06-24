<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Expendiente extends Model
{
    protected $table='expediente';

    protected $primaryKey='idexpediente'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'historial',       
        'idficha_diagnostico',
        'cedula'  
        

    ];
    protected $guarded=[];
}
