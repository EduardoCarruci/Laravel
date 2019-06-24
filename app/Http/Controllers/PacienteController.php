<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
//-------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\PacienteFormRequest;
use proyecto\Paciente;
//---------------
use DB;
use  PDF;



//----

class PacienteController extends Controller
{

    
    public function index(Request $request){
      
        $query=trim($request->get('searchText')); 

        $paciente=DB::table('paciente as pacient')
      
        ->select('pacient.cedula as cedula','pacient.nombre as nombre','pacient.numero as numero','pacient.apellido as apellido',
        'pacient.telefono as telefono','pacient.direccion as direccion','pacient.edad as edad') 
        ->where('pacient.nombre','LIKE','%'.$query. '%') 
        ->where('pacient.apellido','LIKE','%'.$query. '%') 
        ->where('pacient.edad','LIKE','%'.$query. '%') 
        ->orderBy('pacient.edad', 'desc')
        ->paginate(7);
        
        return view('medicos.paciente.index',["paciente"=>$paciente,"searchText"=>$query]);
    }
    public function imprimir(){
  /*     $pdf = PDF::loadView('medicos.paciente.pdf'); //nombre de la vista
      
      return $pdf->download('pene.pdf'); // nombre del pdf */
    }
    
    public function show($id){
        //$pdf = \PDF::loadView('productType.invoice', compact('data'));
        $paciente=Paciente::findOrFail($id);
        $pdf = PDF::loadView('medicos.paciente.pdf', compact('paciente'));

        return $pdf->download('pene.pdf');
    }

    public function create(){
     /*    $expediente=DB::table('expediente')->get();  */
        //return view("medicos.paciente.create",["expediente"=>$expediente]);
        return view("medicos.paciente.create");
    }
    public function store(PacienteFormRequest $request){
        $paciente= new Paciente();
        $paciente->nombre=$request->get('nombre');
        $paciente->cedula=$request->get('cedula');
        $paciente->apellido=$request->get('apellido');
        $paciente->numero=$request->get('numero');
        $paciente->telefono=$request->get('telefono');
        $paciente->direccion=$request->get('direccion');
        $paciente->edad=$request->get('edad');
        //$paciente->idexpediente=$request->get('idexpediente');

       $paciente->save(); 
       return Redirect::to('medicos/paciente');  
    }

    public function edit($id){

        $paciente=Paciente::findOrFail($id); // se selecciona ese ficha_diagnostico en especifico;
      
       // $expediente=DB::table('expediente')->get(); 

      //  return view("medicos.paciente.edit",["paciente"=>$paciente, "expediente"=>$expediente]);
      return view("medicos.paciente.edit",["paciente"=>$paciente]);
    }

    public function update(PacienteFormRequest $request,$id){
        $paciente=Paciente::findOrFail($id);
        $paciente->nombre=$request->get('nombre');
        $paciente->cedula=$request->get('cedula');
        $paciente->apellido=$request->get('apellido');
        $paciente->numero=$request->get('numero');
        $paciente->telefono=$request->get('telefono');
        $paciente->direccion=$request->get('direccion');
        $paciente->edad=$request->get('edad');
       // $paciente->idexpediente=$request->get('idexpediente');
      
        $paciente->update();
        return Redirect::to('medicos/paciente');
    }
   

  
    public function destroy($id){   

        $paciente=Paciente::findOrFail($id); 
      
       $paciente->delete(); 
        
       return Redirect::to('medicos/paciente');
   }

  
}
