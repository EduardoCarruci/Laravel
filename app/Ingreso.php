<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    //web.php crea la ruta y crea el controlador tambien.

    // ahcer referencia a la tabla Categoria de la BD

    protected $table='ingreso';

    protected $primaryKey='idingreso'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idpersona',
        'tipocomprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'
        
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
