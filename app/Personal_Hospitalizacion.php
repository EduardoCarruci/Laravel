<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Personal_Hospitalizacion extends Model
{
    protected $table='personal_hospitalizacion';

    protected $primaryKey='idpersonal_hospitalizacion'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idhospitalizacion',
        'idcedula'
       
        
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
