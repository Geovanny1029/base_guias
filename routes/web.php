<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
})->name('login');

//rutas usuario
Route::resource('user','UserController');

Route::get('userse',[
			'uses' => 'UserController@view',
			'as'   => 'user.view'
]);

Route::post('useru',[
			'uses' => 'UserController@actualiza',
			'as'   => 'user.actualiza'
]);


Route::get('user/{id}/destroy',[
			'uses' => 'UserController@destroy',
			'as'   => 'user.destroy'
]);

//rutas registro
Route::resource('registro','RegistroController');

Route::get('registroe',[
			'uses' => 'RegistroController@view',
			'as'   => 'registro.view'
]);

Route::get('registronu',[
			'uses' => 'RegistroController@viewnu',
			'as'   => 'registro.viewnu'
]);

Route::post('registrou',[
			'uses' => 'RegistroController@actualiza',
			'as'   => 'registro.actualiza'
]);


Route::post('registrounu',[
			'uses' => 'RegistroController@actualizanu',
			'as'   => 'registro.actualizanu'
]);

Route::get('registro/{id}/destroy',[
			'uses' => 'RegistroController@destroy',
			'as'   => 'registro.destroy'
]);

//rutas agente
Route::resource('agente','AgenteController');

Route::get('agentee',[
			'uses' => 'AgenteController@view',
			'as'   => 'agente.view'
]);

Route::post('agenteu',[
			'uses' => 'AgenteController@actualiza',
			'as'   => 'agente.actualiza'
]);


//rutas aerolinea
Route::resource('Aerolinea','AerolineaController');

Route::get('aerolineae',[
			'uses' => 'AerolineaController@view',
			'as'   => 'Aerolinea.view'
]);

Route::post('aerolineau',[
			'uses' => 'AerolineaController@actualiza',
			'as'   => 'Aerolinea.actualiza'
]);


Route::get('Aerolinea/{id}/destroy',[
			'uses' => 'AerolineaController@destroy',
			'as'   => 'Aerolinea.destroy'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
