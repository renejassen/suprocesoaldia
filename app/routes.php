<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getHome'));
Route::get('quienes-somos', array('as' => 'quienes', 'uses' => 'HomeController@getQuienes'));
Route::get('contactenos', array('as' => 'contactenos', 'uses' => 'HomeController@getContactenos'));
Route::get('servicios', array('as' => 'servicios', 'uses' => 'HomeController@getServicios'));
Route::get('publicaciones-virtuales-a-nivel-nacional', array('as' => 'servicio1', 'uses' => 'HomeController@getServicio1'));
Route::get('Vigilancia-y-control-de-procesos-juridicos', array('as' => 'servicio2', 'uses' => 'HomeController@getServicio2'));
Route::get('ubicacion-levantamiento-de-informacion-y-desarchive', array('as' => 'servicio3', 'uses' => 'HomeController@getServicio3'));
Route::get('fiscalizacion-de-procesos-judiciales', array('as' => 'servicio4', 'uses' => 'HomeController@getServicio4'));
Route::get('acompanamiento-a-audiencias-judiciales-y-extrajudiciales', array('as' => 'servicio5', 'uses' => 'HomeController@getServicio5'));
Route::get('radicacion-de-documentos-en-despachos', array('as' => 'servicio6', 'uses' => 'HomeController@getServicio6'));
Route::get('servicios-adicionales', array('as' => 'servicio7', 'uses' => 'HomeController@getServicio7'));
Route::get('cobertura', array('as' => 'cobertura', 'uses' => 'HomeController@getCobertura'));
Route::post('contactenos', array('as'=>'contactenos.post', 'uses'=>'HomeController@postContactenos'));

Route::get('app', array('as' => 'admin.login', 'uses' => 'AdminAuthController@getLogin'));
Route::post('app', array('as' => 'admin.login.post', 'uses' => 'AdminAuthController@postLogin'));
Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'AdminAuthController@getLogout'));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function(){
	Route::get('inicio', function(){ return View::make('admin.inicio'); });
	Route::resource('calendar', 'AdminCalendarController');
	Route::resource('users', 'AdminUsersController', array( 'except' => array('show') ));
	Route::put('users/updateEstado/{id}/{estado}', array('as' => 'admin.users.updateEstado', 'uses' => 'AdminUsersController@updateEstado'));

	Route::resource('roles', 'AdminRolesController', array( 'except' => array('show') ));

	Route::get('permisos', array('as' => 'admin.permisos', 'uses' => 'AdminPermisosController@index'));
	Route::get('permisos.asignar', array('as' => 'admin.permisos.asignar', 'uses' => 'AdminPermisosController@asignar'));
	Route::get('permisos.desasignar', array('as' => 'admin.permisos.desasignar', 'uses' => 'AdminPermisosController@desasignar'));

	Route::resource('clientes', 'AdminClientesController');
	Route::put('clientes/activar/{id}/{user_id}/{estado}', array('as' => 'admin.clientes.activar', 'uses' => 'AdminClientesController@activar'));
	Route::get('XMHT45UJ3DF4567HTMP2306JSHDU710MNCGV', array('as' => 'admin.clientes.email', 'uses' => 'AdminClientesController@emailDiario'));


	Route::resource('servicios', 'AdminServiciosController');

	Route::resource('procesotipos', 'AdminProcesoTiposController');
	Route::resource('procesos', 'AdminProcesosController');

	Route::get('procesos-buscar', array('as' => 'admin.procesos.search', 'uses' => 'AdminProcesosController@getSearch'));
	Route::post('procesos-buscar', array('as' => 'admin.procesos.search.post', 'uses' => 'AdminProcesosController@postSearch'));

	Route::get('procesos-generar-listado', array('as' => 'admin.procesos.list', 'uses' => 'AdminProcesosController@getList'));
	Route::post('procesos-generar-listado', array('as' => 'admin.procesos.list.post', 'uses' => 'AdminProcesosController@postList'));

	Route::resource('procesos.instancias', 'AdminInstanciasController', array('except' => array('show') ));
	Route::resource('procesos.actores', 'AdminActoresController', array('except' => array('show') ));
	// Route::put('procesos/updateCliente/{id}', array('as' => 'admin.procesos.updateCliente', 'uses' => 'AdminProcesosController@updateCliente'));

	Route::put('procesos/updateAdicional/{id}', array('as' => 'admin.procesos.updateAdicional', 'uses' => 'AdminProcesosController@updateAdicional'));
	Route::put('procesos/clientList/{id}', array('as' => 'admin.procesos.clientList', 'uses' => 'AdminProcesosController@clientList'));

	Route::resource('procesos.actuaciones', 'AdminActuacionesController');
	Route::resource('actuaciontipos', 'AdminActuacionTiposController', array('except' => array('show')));
	Route::resource('etapas', 'AdminEtapasController', array('except' => array('show')));
	Route::resource('publicaciones', 'AdminPublicacionesController', array('except' => array('show')));

	Route::resource('carteleras', 'AdminCartelerasController');
	Route::get('carteleras/{despacho_id}/{fecha}', array('as' => 'admin.carteleras.showPublicacion', 'uses' => 'AdminCartelerasController@showPublicacion'));

	Route::get('carteleras-buscar', array('as' => 'admin.carteleras.search', 'uses' => 'AdminCartelerasController@getSearch'));
	Route::post('carteleras-buscar', array('as' => 'admin.carteleras.search.post', 'uses' => 'AdminCartelerasController@postSearch'));

	Route::get('carteleras-reporte', array('as' => 'admin.carteleras.report', 'uses' => 'AdminCartelerasController@getReport'));
	Route::post('carteleras-reporte', array('as' => 'admin.procesos.report.post', 'uses' => 'AdminCartelerasController@postReport'));

	Route::post('despacho/crear', array('as' => 'admin.despachos.create.post','uses' => 'AdminCartelerasController@crearDespacho'));

	Route::resource('departamentos', 'AdminDepartamentosController', array('except' => array('show') ));
	Route::resource('departamentos.municipios', 'AdminMunicipiosController', array('except' => array('show') ));
	Route::resource('departamentos.municipios.despachos', 'AdminDespachosController', array('except' => array('show') ));

	//Ruta para consultar todos los departamentos
	Route::get('departamentos_lista', function(){
	  if(Request::ajax()){
	      return Departamento::all()->toJson();
	  }
	});

	//Ruta en la cual retornamos los municipios relaccionados con el id del departamento
	Route::POST('municipios_lista', function(){
	  if(Request::ajax()){
	  	  $departamento_id = e(Input::get('departamento_id'));
	  	  return Municipio::where('departamento_id','=', $departamento_id)->get();
	  }
	});

	//Ruta en la cual retornamos los despachos relaccionados con el id del municipio
	Route::POST('despachos_lista', function(){
	  if(Request::ajax()){
	  	  $municipio_id = e(Input::get('municipio_id'));
	  	  return Despacho::where('municipio_id','=', $municipio_id)->get();
	  }
	});
});
