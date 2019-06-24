<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table='cita';

    protected $primaryKey='idorden'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        
        'fecha',
        'licencia',
        'sintomas',
        'cedula'
        
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
