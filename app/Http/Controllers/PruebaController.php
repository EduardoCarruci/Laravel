<?php 

namespace proyecto\Http\Controllers;

use proyecto\Http\Controllers\Controller;

class PruebaController extends Controller{
	public function prueba($parametro){
		return 'Estoy dentro de PruebaController y soy '.$parametro;
	}
}

?>