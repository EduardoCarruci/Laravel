<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
//------------
use proyecto\Categoria; // agregar al proyecto el modelo
use Illuminate\Support\Facades\Redirect; // para redireciones
use proyecto\Http\Requests\CategoriaFormRequest; //agregando reglas
use DB;
use SebastianBergmann\Environment\Console; //clase db de laravel
//--------------------
class CategoriaController extends Controller
{
    // constructor

    public function __construct(){
  
    }

    public function index(Request $request){
        if($request){
        //obtener todos los registros de la tabla categoria
         // filtrar por el texto de busqueda por categoria  
        $query=trim($request->get('searchText')); // texto del formulario 
        $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query. '%')->get(); //buscar ese texto en cualquier lugar de la cadena

            //NOTAAAAAAAAAA SE ESTA BUSCANOD POR NOMBRE EN EL FROMULARIO 



        // ->where('condicion','=','1')
         //->orderBy('idcategoria','desc')
        // ->pagination(7);   


        //a retornar la vista
        
        return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }
    // retornar a la vista
    public function create(){
        return view("almacen.categoria.create");
    }
    //crear en bd / almacenar el objeto
    public function store(CategoriaFormRequest $request){
        $categoria= new Categoria();
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');

       // $categoria->condicion='1'; 

       $categoria->save(); //almacenar
       return Redirect::to('almacen/categoria');  //devolviendo al listado
    }
    //mostrar
    public function show($id){ // id q quiero mostrar
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]); // llama al show pero por la categoria " $id " 
    }
    public function edit($id){
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    //
    public function update(CategoriaFormRequest $request,$id){
    $categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');    
    $categoria->descripcion=$request->get('descripcion'); 
    $categoria->update();
    return Redirect::to('almacen/categoria');
    }
    //destruir y elimiar de la bd
    public function destroy($id){  
      
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return Redirect::to('almacen/categoria');


        
    }


}
