<?php

class AdminEtapasController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_etapas', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_etapas', array('only' => 'create') );
        $this->beforeFilter('crear_etapas', array('only' => 'store') );
        $this->beforeFilter('editar_etapas', array('only' => 'edit') );
        $this->beforeFilter('editar_etapas', array('only' => 'update') );
        $this->beforeFilter('eliminar_etapas', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of etapas
	 *
	 * @return Response
	 */
	public function index()
	{
		$etapas = Etapa::all();

		return View::make('admin.etapas.index', compact('etapas'));
	}

	/**
	 * Show the form for creating a new etapa
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.etapas.create');
	}

	/**
	 * Store a newly created etapa in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Etapa::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Etapa::create($data);

		return Redirect::route('admin.etapas.index')->with('message_store',true);
	}

	/**
	 * Display the specified etapa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$etapa = Etapa::findOrFail($id);

		return View::make('admin.etapas.show', compact('etapa'));
	}

	/**
	 * Show the form for editing the specified etapa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$etapa = Etapa::find($id);

		return View::make('admin.etapas.edit', compact('etapa'));
	}

	/**
	 * Update the specified etapa in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$etapa = Etapa::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Etapa::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$etapa->update($data);

		return Redirect::back()->with('message',true);
	}

	/**
	 * Remove the specified etapa from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Etapa::destroy($id);

		return Redirect::route('admin.etapas.index')->with('message_destroy',true);;
	}

}
