<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Medico_Hospitalizacion extends Model
{
    protected $table='medico_hospitalizacion';

    protected $primaryKey='idmedico_hospitalizacion'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idhospitalizacion',
        'licencia'
       
        
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
