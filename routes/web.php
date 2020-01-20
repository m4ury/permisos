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
Route::resource('salidas', 'SalidaController');
Route::resource('viaticos', 'ViaticoController');
Route::get('capacitacion/{capacitacion}', 'PermisoController@showCap');
Route::get('viatico/{viatico}', 'PermisoController@showViatico');

//routes para reuniones-acta
Route::resource('reuniones', 'ReunionController')->middleware(['auth', 'admin']);
Route::resource('categorias', 'CategoriaController')->middleware(['auth', 'admin']);

//routes para edicion de perfil de usuarios
Route::put('/user/{user}/update', 'Usercontroller@update')->name('user.update');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {//routes 
    Voyager::routes();
});
