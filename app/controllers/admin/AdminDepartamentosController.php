<?php

class AdminDepartamentosController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_departamentos', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_departamentos', array('only' => 'create') );
        $this->beforeFilter('crear_departamentos', array('only' => 'store') );
        $this->beforeFilter('editar_departamentos', array('only' => 'edit') );
        $this->beforeFilter('editar_departamentos', array('only' => 'update') );
        $this->beforeFilter('eliminar_departamentos', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of departamentos
	 *
	 * @return Response
	 */
	public function index()
	{
		$departamentos = Departamento::all();

		return View::make('admin.departamentos.index', compact('departamentos'));
	}

	/**
	 * Show the form for creating a new departamento
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.departamentos.create');
	}

	/**
	 * Store a newly created departamento in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Departamento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Departamento::create($data);

		return Redirect::route('admin.departamentos.index')->with('message_store', true);
	}

	/**
	 * Display the specified departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$departamento = Departamento::findOrFail($id);

		return View::make('admin.departamentos.show', compact('departamento'));
	}

	/**
	 * Show the form for editing the specified departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento = Departamento::find($id);

		return View::make('admin.departamentos.edit', compact('departamento'));
	}

	/**
	 * Update the specified departamento in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$departamento = Departamento::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Departamento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$departamento->update($data);

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified departamento from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Departamento::destroy($id);

		return Redirect::route('admin.departamentos.index')->with('message_destroy', true);
	}

}
