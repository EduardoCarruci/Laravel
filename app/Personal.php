<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';

    protected $primaryKey='cedula'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'cedula',       
        'nombre',       
        'apellido',
        'areatrabajo'

    ];
    protected $guarded=[];
}
