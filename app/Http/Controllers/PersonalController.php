<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

//------------
use proyecto\Personal; // agregar al proyecto el modelo
use Illuminate\Support\Facades\Redirect; // para redireciones
use proyecto\Http\Requests\PersonalFormRequest; //agregando reglas
use DB;
use SebastianBergmann\Environment\Console; //clase db de laravel

class PersonalController extends Controller
{
    public function index(Request $request){
        if($request){
            
            $query=trim($request->get('searchText')); 
            $personal=DB::table('personal')->where('nombre','LIKE','%'.$query. '%')->get();
        }
    return view('hospitalizacion.personal.index',["personal"=>$personal,"searchText"=>$query]);
           
    }

    public function create(){
        return view("hospitalizacion.personal.create");
    }
    //crear en bd / almacenar el objeto
    public function store(PersonalFormRequest $request){
        $personal= new Personal();

        $personal->cedula=$request->get('cedula');
        $personal->nombre=$request->get('nombre');
        $personal->apellido=$request->get('apellido');
        $personal->areatrabajo=$request->get('areatrabajo'); 

      

       $personal->save(); 
       return Redirect::to('hospitalizacion/personal');  
    }
    //mostrar
    public function show($id){ 
        return view("hospitalizacion.personal.show",["personal"=>Personal::findOrFail($id)]);
    }
    public function edit($id){
        return view("hospitalizacion.personal.edit",["personal"=>Personal::findOrFail($id)]);
    }
  
    public function update(PersonalFormRequest $request,$id){
    $personal=Personal::findOrFail($id);
    $personal->nombre=$request->get('nombre');    
    $personal->apellido=$request->get('apellido'); 
    $personal->areatrabajo=$request->get('areatrabajo'); 
    $personal->update();
    return Redirect::to('hospitalizacion/personal');
    }

    //destruir y elimiar de la bd
    public function destroy($cedula){  
        
        $personal=Personal::findOrFail($cedula);
      
        $personal->delete();
        return Redirect::to('hospitalizacion/personal');
        
    }
}
