<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','Principal@index');
Route::get('administrador','Principal@admin');
Route::resource('usuario','Usuario');
Route::resource('loguearse','Login\Autenticacion');

Route::group(['middleware'=>['web']], function (){
	
	Route::resource('agente','Agente\RevisionPermanencia'); //Esto cuando vaya a hacer propiamente un crud
	Route::get('guardarTurnoEntrada','Agente\RegistrarTurno@guardarTurnoEntrada');
	Route::get('entrada','Agente\RegistrarTurno@crearRegistroEntrada');
	Route::get('salida','Agente\RegistrarTurno@crearRegistroSalida\{id?}',function ($id){
		return view('agente.forms.registro_salida');
	});


	Route::get('listar','Agente\RegistrarTurno@listarTurnosEntradaSalida');
	Route::get('listarSalidas','Agente\RegistrarTurno@listarSalidas');

	Route::resource('bitacora','Agente\Bitacora'); //Esto cuando vaya a hacer propiamente un crud
});