<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\CitaFormRequest;
use proyecto\Cita;
//---------------
use DB;
//----

use PDF;

class CitaController extends Controller
{
    public function index(Request $request){
      
        $query=trim($request->get('searchText')); 
       

        $cita=DB::table('cita as cit')
        ->join('medico as medic', 'medic.licencia','=','cit.licencia')
        ->join('paciente as pacien', 'pacien.cedula','=','cit.cedula')
        ->select('cit.idorden as idorden','cit.fecha as fecha','cit.licencia as licencia','cit.sintomas as sintomas',
        'cit.cedula as cedula') 
       /*  ->where('cit.fecha','LIKE','%'.$query. '%') */
        ->paginate(7);
        
        return view('cita.index',["cita"=>$cita,"searchText"=>$query]);
    }

    public function create(){
        $medico=DB::table('medico')->get(); //dame todas los medicos papa.
        $paciente=DB::table('paciente')->get();
        return view("cita.create",["medico"=>$medico,"paciente"=>$paciente]);
    }
    public function store(CitaFormRequest $request){
        $cita= new Cita();
        //$cita->orden=$request->get('orden');
        $cita->fecha=$request->get('fecha');
        $cita->licencia=$request->get('licencia');
        $cita->sintomas=$request->get('sintomas');
        $cita->cedula=$request->get('cedula');

       $cita->save(); 
       return Redirect::to('cita');  
    }

    public function edit($id){
       
        $cita=Cita::findOrFail($id); 
        //$cita = Cita::where('orden', $orden)->firstOrFail();
        //return $cita;
        $medico=DB::table('medico')->get(); 
        $paciente=DB::table('paciente')->get(); 
               
        return view("cita.edit",["paciente"=>$paciente,"medico"=>$medico, "cita"=>$cita]);

       
    }

    public function update(CitaFormRequest $request,$id){
        $cita=Cita::findOrFail($id);
         
        $cita->fecha=$request->get('fecha');    
        $cita->licencia=$request->get('licencia');    
        $cita->sintomas=$request->get('sintomas');
        $cita->cedula=$request->get('cedula');
        $cita->update();
        return Redirect::to('cita');
    }
    public function show($id,Request $request){
        //$pdf = \PDF::loadView('productType.invoice', compact('data'));

        $fecha=($request->get('searchText'));   

     



        $cita=DB::table('cita as cit')
        ->join('medico as medic', 'medic.licencia','=','cit.licencia')
        ->join('paciente as pacien', 'pacien.cedula','=','cit.cedula')
        ->select('cit.idorden as idorden','cit.fecha as fecha','cit.licencia as licencia','cit.sintomas as sintomas',
        'cit.cedula as cedula','pacien.nombre as nombre','pacien.apellido as apellido','medic.especialidad as especialidad') 
         ->where('cit.fecha','=','%'.$fecha. '%')->get();

       
         
         $contador = count($cita);
       
             



         
        //$cita=Cita::findOrFail($id);
        $pdf = PDF::loadView('cita.pdf', compact('cita' ,'contador'));
       /*  $query=trim($request->get('searchText'));  */
      
      
       return $pdf->download('pene.pdf');
    }
   
   

  
    public function destroy($id){   

        $cita=Cita::findOrFail($id); 
      
       $cita->delete(); 
        
       return Redirect::to('cita');
   }
}
