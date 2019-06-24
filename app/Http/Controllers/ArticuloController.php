<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\ArticuloFormRequest;
use proyecto\Articulo;
//---------------
use DB;
//----


class ArticuloController extends Controller
{
    public function __construct(){
  
    }
    //--- se crea el objeto para validar el request
    public function index(Request $request){
        if($request){
        //obtener todos los registros de la tabla categoria
         // filtrar por el texto de busqueda por categoria  
        $query=trim($request->get('searchText')); // texto del formulario 
        $articulos=DB::table('articulo as art')
        ->join('categoria as cate', 'art.idarticulo','=','cate.idcategoria')
        ->select('art.idarticulo','art.nombre','art.codigo','art.stock','cate.nombre as categoria' , 'art.descripcion','art.estado') // que buen select papa.
        ->where('art.nombre','LIKE','%'.$query. '%') //buscar ese texto en cualquier lugar de la cadena
        ->orderBy('art.idarticulo', 'desc')
        ->paginate(7);
        
        return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
    }
    // retornar a la vista   --- mostrar el listado de categorias enun comboBOX de todas las categorias
    public function create()
    {   //consulta a la BD
        $categorias=DB::table('categoria')->get(); //dame todas las categorias papa.
        return view("almacen.articulo.create",["categorias"=>$categorias]); //se cambia y se manda el parametro DE TODAS LAS CATEGORIAS 
    }
    //crear en bd / almacenar el objeto  // aca se valida en el form de las validaciones ya realizadas
    public function store(ArticuloFormRequest $request){
        $articulo= new Articulo();
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        //--aca supuestamente deberia estar la validacion de la imagen
        /*
        if(Input::hasFile('imagen')){
                $file=Input::file('imagen');
                $file->move(public_patch().'/imagenes/articulos/',$file->getClientOriginalName());
                $articulos->imagen=$file->getClientOriginalName();
        }
        

        */
       // $categoria->condicion='1'; 

       $articulo->save(); //almacenar
       return Redirect::to('almacen/articulo');  //devolviendo al listado
    }
    //mostrar
    public function show($id){ // id q quiero mostrar
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]); // llama al show pero por la categoria " $id " 
    }
    public function edit($id){
        //ver detalles del articulo uy bebecitaaaaaaaaaaaaa
        
        $articulo=Articulo::findOrFail($id); // se selecciona ese articulo en especifico;
        //al momento de editar se necesita tambien la categoria
        $categorias=DB::table('categoria')->get(); //obten las categorias;

        return view("almacen.articulo.edit",["articulo"=>$articulo, "categorias"=>$categorias]);
    }
    //
    public function update(ArticuloFormRequest $request,$id){
        $articulo=Articulo::findOrFail($id);
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        

        //--aca supuestamente deberia estar la validacion de la imagen
        /*
        if(Input::hasFile('imagen')){
                $file=Input::file('imagen');
                $file->move(public_patch().'/imagenes/articulos/',$file->getClientOriginalName());
                $articulos->imagen=$file->getClientOriginalName();
        }
        

        */
    $articulo->update();
    return Redirect::to('almacen/articulo'); //A LA VISTA
    }
    //destruir y elimiar de la bd
    public function destroy($id){   

        $articulo=Articulo::findOrFail($id); //selecciona ese articulo.
        $articulo->estado='Inactivo';
        $articulo->update();
        
        return Redirect::to('almacen/articulo');


        
    }
}
