<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table='persona';

    protected $primaryKey='idpersona'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idpersona',
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email'

    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
