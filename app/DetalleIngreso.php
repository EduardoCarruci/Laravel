<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    
    protected $table='detalle_ingreso';

    protected $primaryKey='iddetalle_ingreso'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idingreso',
        'idarticulo',
        'cantidad',
        'precio_compra',
        'precio_venta',
        
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];
}
