<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table='medico';

    protected $primaryKey='licencia'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'licencia',       
        'numero',       
        'nombre',
        'apellido',
        'telefono',
        'tipo',
        'especialidad'
    ];
    protected $guarded=[];
}
