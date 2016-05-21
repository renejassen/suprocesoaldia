<?php

class AdminServiciosController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_servicios', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_servicios', array('only' => 'create') );
        $this->beforeFilter('crear_servicios', array('only' => 'store') );
        $this->beforeFilter('editar_servicios', array('only' => 'edit') );
        $this->beforeFilter('editar_servicios', array('only' => 'update') );
        $this->beforeFilter('eliminar_servicios', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of servicios
	 *
	 * @return Response
	 */
	public function index()
	{
		$servicios = Servicio::all();

		return View::make('admin.servicios.index', compact('servicios'));
	}

	/**
	 * Show the form for creating a new servicio
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.servicios.create');
	}

	/**
	 * Store a newly created servicio in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Servicio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Servicio::create($data);

		return Redirect::route('admin.servicios.index')->with('message_store', true);
	}

	/**
	 * Display the specified servicio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$servicio = Servicio::findOrFail($id);

		return View::make('admin.servicios.show', compact('servicio'));
	}

	/**
	 * Show the form for editing the specified servicio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$servicio = Servicio::find($id);

		return View::make('admin.servicios.edit', compact('servicio'));
	}

	/**
	 * Update the specified servicio in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$servicio = Servicio::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Servicio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$servicio->update($data);

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified servicio from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Servicio::destroy($id);

		return Redirect::route('admin.servicios.index')->with('message_destroy',true);
	}

}
