<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\MedicoFormRequest;
use proyecto\Medico;
//---------------
use DB;
//----


class MedicController extends Controller
{
   public function index(Request $request){
      
      $query=trim($request->get('searchText')); 

      $medico=DB::table('medico as m')
      ->select('m.nombre as nombre','m.apellido as apellido','m.telefono as telefono','m.tipo as tipo',
      'm.especialidad as especialidad','m.licencia as licencia','m.numero as numero') 
      ->where('m.nombre','LIKE','%'.$query. '%') 
      ->orderBy('m.licencia', 'desc')
      ->paginate(7);
      
      return view('medicos.medic.index',["medico"=>$medico,"searchText"=>$query]);
  }

  public function create(){
   return view("medicos.medic.create");
}


public function store(MedicoFormRequest $request){
   $medico= new Medico();
   $medico->nombre=$request->get('nombre');
   $medico->apellido=$request->get('apellido');
   $medico->licencia=$request->get('licencia');
   $medico->telefono=$request->get('telefono');
   $medico->numero=$request->get('numero');
   $medico->tipo=$request->get('tipo');
   $medico->especialidad=$request->get('especialidad');
   $medico->save(); 
  return Redirect::to('medicos/medic');  
}


public function update(MedicoFormRequest $request,$licencia){
 
  
     $medico=Medico::findOrFail($licencia);
   $medico->nombre=$request->get('nombre');    
   $medico->apellido=$request->get('apellido'); 
   $medico->telefono=$request->get('telefono'); 
   $medico->numero=$request->get('numero'); 
   $medico->tipo=$request->get('tipo'); 
   $medico->especialidad=$request->get('especialidad'); 
   
   $medico->update();
   return Redirect::to('medicos/medic');  
   /* return Redirect::to('medicos/medic');  */
   }


public function show($id){ 
   return view("medicos.medic.show",["medico"=>Medico::findOrFail($id)]);
}
public function edit($id){
   return view("medicos.medic.edit",["medico"=>Medico::findOrFail($id)]);
}

public function destroy($licencia){  
        
   $medico=Medico::findOrFail($licencia);
 
   $medico->delete();
   
   return Redirect::to('medicos/medic');
   
}
}
