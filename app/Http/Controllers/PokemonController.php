<?php

namespace proyecto\Http\Controllers;
use proyecto\Pokemon;
use proyecto\Cliente;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //listar todos

    public function index(Cliente $cliente, Request $request){

    	if($request->ajax()){
         //   $pokemons = Pokemon::all(); // agarrando todos los pokemones que existen actualmente en LOS REGISTROS 
    		//$pokemons = $cliente->pokemons; DE ESTA MANERA SE PUEDEN MOSTRA LA RELACION TAMBIEN SE PUEDE DE LA MANERA QUE ESTA ABAJO
            //RECUERDALO
            return response()->json($cliente->pokemons,200);





            //return response()->json($pokemons,200); // pasando los pkemons
    	}
    	return view('pokemons.index');
    }

    public function store(Cliente $cliente, Request $request){
        
       
    	if($request->ajax()){
    	  	$pokemon = new Pokemon();
            $pokemon->name = $request->input('name'); 
            $pokemon->picture = $request->input('picture');
            $pokemon->cliente()->associate($cliente)->save(); // el pokemon accede a la relacion con associate con el lciente que recibe
            //$pokemon->save();


    		return response()->json([
               // "cliente"=>$cliente,
                "message" => "Pokemon creado correctamente",
                 "pokemon" => $pokemon
             ],200);

    	}
    }

}
