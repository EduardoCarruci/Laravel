<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //web.php crea la ruta y crea el controlador tambien.

    // ahcer referencia a la tabla Categoria de la BD

    protected $table='categoria';

    protected $primaryKey='idcategoria'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'nombre',
        'descripcion'
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];



}
