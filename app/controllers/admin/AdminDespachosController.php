<?php

class AdminDespachosController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_despachos', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_despachos', array('only' => 'create') );
        $this->beforeFilter('crear_despachos', array('only' => 'store') );
        $this->beforeFilter('editar_despachos', array('only' => 'edit') );
        $this->beforeFilter('editar_despachos', array('only' => 'update') );
        $this->beforeFilter('eliminar_despachos', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of despachos
	 *
	 * @return Response
	 */
	public function index($departamento_id, $municipio_id)
	{
		$departamento = Departamento::with('municipios')->findOrFail($departamento_id);
		$municipio = Municipio::with('despachos')->findOrFail($municipio_id);
		$despachos = $municipio->despachos;

		return View::make('admin.despachos.index', compact('departamento','municipio','despachos'));
	}

	/**
	 * Show the form for creating a new despacho
	 *
	 * @return Response
	 */
	public function create($departamento_id, $municipio_id)
	{
		$departamento = Departamento::findOrFail($departamento_id);
		$municipio = Municipio::findOrFail($municipio_id);
		return View::make('admin.despachos.create', compact('departamento', 'municipio'));
	}

	/**
	 * Store a newly created despacho in storage.
	 *
	 * @return Response
	 */
	public function store($departamento_id, $municipio_id)
	{
		$validator = Validator::make($data = Input::all(), Despacho::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $departamento = Departamento::with('municipios')->findOrFail($departamento_id);
		$municipio = Municipio::with('despachos')->findOrFail($municipio_id);
		$despacho = new Despacho(Input::all());
		$municipio->despachos()->save($despacho);

		return Redirect::route('admin.departamentos.municipios.despachos.index', array($departamento_id, $municipio_id))->with('message_store', true);
	}

	/**
	 * Display the specified despacho.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$despacho = Despacho::findOrFail($id);

		return View::make('despachos.show', compact('despacho'));
	}

	/**
	 * Show the form for editing the specified despacho.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($departamento_id, $municipio_id, $id)
	{
		$departamento = Departamento::with('municipios')->findOrFail($departamento_id);
		$municipio = Municipio::with('despachos')->findOrFail($municipio_id);
        $despacho = Despacho::findOrFail($id);

		return View::make('admin.despachos.edit', compact('departamento','municipio','despacho'));
	}

	/**
	 * Update the specified despacho in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($departamento_id, $municipio_id, $id)
	{
		$despacho = Despacho::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Despacho::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$despacho->fill(Input::all());
		$despacho->save();

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified despacho from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($departamento_id, $municipio_id, $id)
	{
		Despacho::destroy($id);

		$departamento = Departamento::with('municipios')->findOrFail($departamento_id);
		$municipio = Municipio::with('despachos')->findOrFail($municipio_id);
        $despacho = $municipio->despachos;

		// return View::make('admin.municipios.index', compact('municipios', 'departamento'))->with('message_destroy', true);
		return Redirect::route('admin.departamentos.municipios.despachos.index', array($departamento_id, $municipio_id))->with('message_destroy', true);

		// return Redirect::route('despachos.index');
	}

}
