<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    protected $table='paciente';

    protected $primaryKey='cedula'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'cedula',
        'numero',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'edad'
     //   'idexpediente' 
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
