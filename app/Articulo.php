<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;



//php artisan make:model Articulo
//php artisan make:request ArticuloFormRequest
class Articulo extends Model
{
    //
    protected $table='articulo';

    protected $primaryKey='idarticulo'; // campo llave primaria

    public $timestamps =false;

    //especificar los campos que se van ha almacenar en la BD

    protected $fillable=[
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'estado',
    ];
    //los campos q no queremos q no se asignen al modelo
    protected $guarded=[];

}
