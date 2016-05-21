<?php

class AdminPublicacionesController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_publicaciones', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_publicaciones', array('only' => 'create') );
        $this->beforeFilter('crear_publicaciones', array('only' => 'store') );
        $this->beforeFilter('editar_publicaciones', array('only' => 'edit') );
        $this->beforeFilter('editar_publicaciones', array('only' => 'update') );
        $this->beforeFilter('eliminar_publicaciones', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of publicaciones
	 *
	 * @return Response
	 */
	public function index()
	{
		$publicaciones = Publicacion::all();

		return View::make('admin.publicaciones.index', compact('publicaciones'));
	}

	/**
	 * Show the form for creating a new publicacion
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.publicaciones.create');
	}

	/**
	 * Store a newly created publicacion in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Publicacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Publicacion::create($data);

		return Redirect::route('admin.publicaciones.index')->with('message_store',true);;
	}

	/**
	 * Display the specified publicacion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$publicacion = Publicacion::findOrFail($id);

		return View::make('admin.publicaciones.show', compact('publicacion'));
	}

	/**
	 * Show the form for editing the specified publicacion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$publicacion = Publicacion::find($id);

		return View::make('admin.publicaciones.edit', compact('publicacion'));
	}

	/**
	 * Update the specified publicacion in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$publicacion = Publicacion::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Publicacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$publicacion->update($data);

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified publicacion from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Publicacion::destroy($id);

		return Redirect::route('admin.publicaciones.index')->with('message_destroy',true);;
	}

}
