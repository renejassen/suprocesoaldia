<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest(route('admin.login'));
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

//usuarios
Route::filter('ver_usuarios', function()
{
    if (!Entrust::can('ver_usuarios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_usuarios', function()
{
    if (!Entrust::can('crear_usuarios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_usuarios', function()
{
    if (!Entrust::can('editar_usuarios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_usuarios', function()
{
    if (!Entrust::can('eliminar_usuarios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//roles
Route::filter('ver_roles', function()
{
    if (!Entrust::can('ver_roles') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_roles', function()
{
    if (!Entrust::can('crear_roles') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_roles', function()
{
    if (!Entrust::can('editar_roles') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_roles', function()
{
    if (!Entrust::can('eliminar_roles') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//clientes
Route::filter('ver_clientes', function()
{
    if (!Entrust::can('ver_clientes') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_clientes', function()
{
    if (!Entrust::can('crear_clientes') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_clientes', function()
{
    if (!Entrust::can('editar_clientes') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_clientes', function()
{
    if (!Entrust::can('eliminar_clientes') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//cartelera
Route::filter('ver_cartelera', function()
{
    if (!Entrust::can('ver_cartelera') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_cartelera', function()
{
    if (!Entrust::can('crear_cartelera') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_cartelera', function()
{
    if (!Entrust::can('editar_cartelera') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_cartelera', function()
{
    if (!Entrust::can('eliminar_cartelera') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//procesos
Route::filter('ver_procesos', function()
{
    if (!Entrust::can('ver_procesos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_procesos', function()
{
    if (!Entrust::can('crear_procesos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_procesos', function()
{
    if (!Entrust::can('editar_procesos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_procesos', function()
{
    if (!Entrust::can('eliminar_procesos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//actuaciones
Route::filter('ver_actuaciones', function()
{
    if (!Entrust::can('ver_actuaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_actuaciones', function()
{
    if (!Entrust::can('crear_actuaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_actuaciones', function()
{
    if (!Entrust::can('editar_actuaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_actuaciones', function()
{
    if (!Entrust::can('eliminar_actuaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//instancias
Route::filter('ver_instancias', function()
{
    if (!Entrust::can('ver_instancias') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_instancias', function()
{
    if (!Entrust::can('crear_instancias') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_instancias', function()
{
    if (!Entrust::can('editar_instancias') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_instancias', function()
{
    if (!Entrust::can('eliminar_instancias') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//actores
Route::filter('ver_actores', function()
{
    if (!Entrust::can('ver_actores') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_actores', function()
{
    if (!Entrust::can('crear_actores') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_actores', function()
{
    if (!Entrust::can('editar_actores') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_actores', function()
{
    if (!Entrust::can('eliminar_actores') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//servicios
Route::filter('ver_servicios', function()
{
    if (!Entrust::can('ver_servicios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_servicios', function()
{
    if (!Entrust::can('crear_servicios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_servicios', function()
{
    if (!Entrust::can('editar_servicios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_servicios', function()
{
    if (!Entrust::can('eliminar_servicios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//departamentos
Route::filter('ver_departamentos', function()
{
    if (!Entrust::can('ver_departamentos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_departamentos', function()
{
    if (!Entrust::can('crear_departamentos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_departamentos', function()
{
    if (!Entrust::can('editar_departamentos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_departamentos', function()
{
    if (!Entrust::can('eliminar_departamentos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//municipios
Route::filter('ver_municipios', function()
{
    if (!Entrust::can('ver_municipios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_municipios', function()
{
    if (!Entrust::can('crear_municipios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_municipios', function()
{
    if (!Entrust::can('editar_municipios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_municipios', function()
{
    if (!Entrust::can('eliminar_municipios') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//despachos
Route::filter('ver_despachos', function()
{
    if (!Entrust::can('ver_despachos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_despachos', function()
{
    if (!Entrust::can('crear_despachos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_despachos', function()
{
    if (!Entrust::can('editar_despachos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_despachos', function()
{
    if (!Entrust::can('eliminar_despachos') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//tipos_proceso
Route::filter('ver_tipos_proceso', function()
{
    if (!Entrust::can('ver_tipos_proceso') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_tipos_proceso', function()
{
    if (!Entrust::can('crear_tipos_proceso') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_tipos_proceso', function()
{
    if (!Entrust::can('editar_tipos_proceso') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_tipos_proceso', function()
{
    if (!Entrust::can('eliminar_tipos_proceso') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//publicaciones
Route::filter('ver_publicaciones', function()
{
    if (!Entrust::can('ver_publicaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_publicaciones', function()
{
    if (!Entrust::can('crear_publicaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_publicaciones', function()
{
    if (!Entrust::can('editar_publicaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_publicaciones', function()
{
    if (!Entrust::can('eliminar_publicaciones') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//etapas
Route::filter('ver_etapas', function()
{
    if (!Entrust::can('ver_etapas') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_etapas', function()
{
    if (!Entrust::can('crear_etapas') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_etapas', function()
{
    if (!Entrust::can('editar_etapas') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_etapas', function()
{
    if (!Entrust::can('eliminar_etapas') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

//tipos_actuacion
Route::filter('ver_tipos_actuacion', function()
{
    if (!Entrust::can('ver_tipos_actuacion') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('crear_tipos_actuacion', function()
{
    if (!Entrust::can('crear_tipos_actuacion') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('editar_tipos_actuacion', function()
{
    if (!Entrust::can('editar_tipos_actuacion') )
    {
        return Redirect::guest(route('admin.login'));
    }
});
Route::filter('eliminar_tipos_actuacion', function()
{
    if (!Entrust::can('eliminar_tipos_actuacion') )
    {
        return Redirect::guest(route('admin.login'));
    }
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
