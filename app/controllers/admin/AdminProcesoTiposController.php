<?php

class AdminProcesoTiposController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_tipos_proceso', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_tipos_proceso', array('only' => 'create') );
        $this->beforeFilter('crear_tipos_proceso', array('only' => 'store') );
        $this->beforeFilter('editar_tipos_proceso', array('only' => 'edit') );
        $this->beforeFilter('editar_tipos_proceso', array('only' => 'update') );
        $this->beforeFilter('eliminar_tipos_proceso', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of procesotipos
	 *
	 * @return Response
	 */
	public function index()
	{
		$procesotipos = ProcesoTipo::all();

		return View::make('admin.procesotipos.index', compact('procesotipos'));
	}

	/**
	 * Show the form for creating a new procesotipo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.procesotipos.create');
	}

	/**
	 * Store a newly created procesotipo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), ProcesoTipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		ProcesoTipo::create($data);

		return Redirect::route('admin.procesotipos.index')->with('message_store', true);
	}

	/**
	 * Display the specified procesotipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$procesotipo = ProcesoTipo::findOrFail($id);

		return View::make('admin.procesotipos.show', compact('procesotipo'));
	}

	/**
	 * Show the form for editing the specified procesotipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$procesotipo = ProcesoTipo::find($id);

		return View::make('admin.procesotipos.edit', compact('procesotipo'));
	}

	/**
	 * Update the specified procesotipo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$procesotipo = ProcesoTipo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), ProcesoTipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$procesotipo->update($data);

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified procesotipo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ProcesoTipo::destroy($id);

		return Redirect::route('admin.procesotipos.index')->with('message_destroy', true);
	}

}
