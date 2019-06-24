<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table='insumos';

    protected $primaryKey='idinsumos'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        
        'nombre',
        'descripcion',
        'fabricante',
        'fechavencimiento'
    ];
    protected $guarded=[];
}
