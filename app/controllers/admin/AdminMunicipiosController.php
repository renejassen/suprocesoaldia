<?php

class AdminMunicipiosController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_municipios', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_municipios', array('only' => 'create') );
        $this->beforeFilter('crear_municipios', array('only' => 'store') );
        $this->beforeFilter('editar_municipios', array('only' => 'edit') );
        $this->beforeFilter('editar_municipios', array('only' => 'update') );
        $this->beforeFilter('eliminar_municipios', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of municipios
	 *
	 * @return Response
	 */
	public function index($departamento_id)
	{
		// $municipios = Municipio::all();

		// $departamento = departamento()->with('municipios')->findOrFail($departamento_id);

  //       $municipios = $departamento->municipios;

        $departamento = Departamento::with('municipios')->findOrFail($departamento_id);
		$municipios = $departamento->municipios;

		return View::make('admin.municipios.index', compact('municipios','departamento'));
	}

	/**
	 * Show the form for creating a new municipio
	 *
	 * @return Response
	 */
	public function create($departamento_id)
	{
		$departamento = Departamento::findOrFail($departamento_id);
		return View::make('admin.municipios.create', compact('departamento'));
	}

	/**
	 * Store a newly created municipio in storage.
	 *
	 * @return Response
	 */
	public function store($departamento_id)
	{
		$validator = Validator::make($data = Input::all(), Municipio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $departamento = Departamento::find($departamento_id);
		$departamento = Departamento::with('municipios')->findOrFail($departamento_id);
		$municipio = new Municipio(Input::all());
		$municipio = $departamento->municipios()->save($municipio);


		return Redirect::route('admin.departamentos.municipios.index', $departamento_id)->with('message_store', true);
	}

	/**
	 * Display the specified municipio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$municipio = Municipio::findOrFail($id);

		return View::make('municipios.show', compact('municipio'));
	}

	/**
	 * Show the form for editing the specified municipio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($departamento_id, $id)
	{
		$departamento = Departamento::with('municipios')->findOrFail($departamento_id);
        $municipio = Municipio::findOrFail($id);
        
        return View::make('admin.municipios.edit', compact('municipio','departamento'));
	}

	/**
	 * Update the specified municipio in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($departamento_id, $id)
	{
		$municipio = Municipio::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Municipio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $municipio->update($data);

		$municipio->fill(Input::all());
		$municipio->save();

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified municipio from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($departamento_id, $id)
	{
		Municipio::destroy($id);

		$departamento = Departamento::with('municipios')->findOrFail($departamento_id);
        $municipios = $departamento->municipios;
        
		return Redirect::route('admin.departamentos.municipios.index', $departamento_id)->with('message_destroy', true);
	}

}
