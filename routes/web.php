<?php
use PHPUnit\Util\Getopt;
use proyecto\Http\Controllers\HospitalizacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/mi_primer_ruta', function(){return 'Tu primera ruta esta en Routes PERO SIN PARAMETRO, web.php';});

//Route::get('/name/{name}', function($name){return 'Hola soy la ruta con parametro '.$name;});

//Route::get('prueba/{name}','PruebaController@prueba');

//Route::resource('clientes','ClienteController');
//Route::resource('pokemons','PokemonController');
//Route::get('clientes/{cliente}/pokemons','PokemonController@index'); // a LISTAR LOS POKEMOSN POR CLIENTE
//Route::post('clientes/{cliente}/pokemons','PokemonController@store'); //se enviara informacion


// rutas para el almacen rutas ligadas al controlador update,delete,create.. 
//controlador en https/controllers
//con consola
//php artisan make:controller CategoriaController
//php artisan make:request CategoriaFormRequest
//Route::resource('almacen/categoria', 'CategoriaController');
//Route::post('almacen/articulo/{id}', 'ArticuloController@destroy');
//Route::resource('almacen/articulo', 'ArticuloController');
// Route::resource('compras/persona', 'PersonaController');
//Route::resource('compras/ingreso', 'IngresoController');
//Route::post('almacen/articulo/{id}', 'ArticuloController@destroy');

//PROYECTO

/*
Route::resource('hospitalizacion', 'HospitalizacionController');
Route::resource('hospitalizacion/insumos', 'InsumosController'); 

*/
Route::get('hospitalizacion','HospitalizacionController@index');
Route::get('medicos','MedicosController@index');

Route::resource('medicos/ficha','FichaController');
Route::resource('medicos/medic','MedicController');
Route::resource('medicos/expediente','ExpedienteController');
Route::resource('cita','CitaController');
Route::get('cita/{id}','CitaController@pdf');
Route::post('cita/{fecha}','CitaController@show');

Route::resource('medicos/paciente','PacienteController');
            //nombre {}
//Route::name('imprimir')->get('/imprimir-pdf','PacienteController@imprimir');

// ESTO ES EL PDDDDDDDDDDDDDDDFFFFFFFFFFFFFFF
Route::get('medicos/paciente/{id}','PacienteController@pdf');


Route::resource('hospitalizacion/personal','PersonalController');
Route::resource('hospitalizacion/insumos','InsumosController');
Route::resource('hospitalizacion/hospital','HospitalController');


//Route::resource('hospitalizacion/personal', 'PersonalController');
//Route::get('hospitalizacion','HospitalizacionController@home')->name('hospital.home');
//Route::get('hospitalizacion/personal','PersonalController@index')->name('personal.index');
// Route::get('hospitalizacion-insumos','InsumoController@index')->name('insumos.index');
//Route::get('prueba/{name}','PruebaController@prueba');
//Route::get('hospital/personal/{id}/{name}','PersonalController@show')->name('personal.show');
//No es resource... el resource por que? --- eso arroja varias rutas .. ve pilla 

//PROBANDO EL PDF


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
