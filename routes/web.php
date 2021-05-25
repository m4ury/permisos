<?php

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
//routes 
Route::resource('permisos', 'PermisoController');
//Route::resource('salidas', 'SalidaController');
Route::resource('problems', 'RelojController');
Route::resource('agendas', 'AgendaController');
Route::resource('viaticos', 'ViaticoController');
Route::get('capacitacion/{capacitacion}', 'PermisoController@showCap');
Route::get('viatico/{viatico}', 'PermisoController@showViatico');

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('reuniones.all', 'ReunionController@all');
    Route::resource('reuniones', 'ReunionController');
    Route::resource('categorias', 'CategoriaController')->except('show');
    Route::resource('acuerdos', 'AcuerdoController');

//rutas para vacunas
    Route::resource('vacunas', 'VacunaController')->except('show');
    Route::resource('pacientes', 'PacienteController');
});
//routes para reuniones-acta


//routes para edicion de perfil de usuarios

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::group(['prefix' => 'admin'], function () {//routes 
    Voyager::routes();
});*/

//Vue
Route::get('categories', function (){
   return view('category');
});
