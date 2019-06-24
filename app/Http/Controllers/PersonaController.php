<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\PersonaFormRequest;
use proyecto\Persona;
//---------------
use DB;
//----

use PDF;

class PersonaController extends Controller
{
    
    public function __construct(){
  
    }
    //--- se crea el objeto para validar el request
    public function index(Request $request){
        if($request){
        //obtener todos los registros de la tabla categoria
         // filtrar por el texto de busqueda por categoria  
        $query=trim($request->get('searchText')); // texto del formulario 
        $personas=DB::table('persona')
        ->where('nombre','LIKE','%'.$query.'%')
        ->where('tipo_persona','=','Proveedor')
        ->orwhere('num_documento','LIKE','%'.$query.'%')
        ->orwhere('nombre','LIKE','%'.$query.'%')
        ->orderBy('idpersona','desc')    
        ->paginate(7);    


        /*->orderBy('art.idarticulo', 'desc')
        ->paginate(7);*/
        
        return view('compras.persona.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }
    // retornar a la vista   --- mostrar el listado de categorias enun comboBOX de todas las categorias
    public function create()
    {   
        
        return view("compras.persona.create");
    }
    //crear en bd / almacenar el objeto  // aca se valida en el form de las validaciones ya realizadas
    public function store(PersonaFormRequest $request){
        $persona= new Persona();
        $persona->tipo_persona=('Proveedor');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
    
       $persona->save(); 
       return Redirect::to('compras/persona'); 
    }
    
    public function show($id){ 
        return view("compras.persona.show",["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id){

        return view("compras.persona.edit",["persona"=>Persona::findOrFail($id)]);
    }
    //
    public function update(PersonaFormRequest $request,$id){
        
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona=$request->get('tipo_persona');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->update();

    return Redirect::to('compras/persona'); 
    }

    public function destroy($id){   
  
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();    
        return Redirect::to('compras/persona');

       
    }

  
}
