<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Hospitalizacion extends Model
{
     //web.php crea la ruta y crea el controlador tambien.

    // ahcer referencia a la tabla Categoria de la BD

    protected $table='hospitalizacion';

    protected $primaryKey='idhospitalizacion'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idinsumos'       
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
