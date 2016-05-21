<?php

class AdminActuacionTiposController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_tipos_actuacion', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_tipos_actuacion', array('only' => 'create') );
        $this->beforeFilter('crear_tipos_actuacion', array('only' => 'store') );
        $this->beforeFilter('editar_tipos_actuacion', array('only' => 'edit') );
        $this->beforeFilter('editar_tipos_actuacion', array('only' => 'update') );
        $this->beforeFilter('eliminar_tipos_actuacion', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of actuaciontipos
	 *
	 * @return Response
	 */
	public function index()
	{
		$actuaciontipos = ActuacionTipo::all();

		return View::make('admin.actuacion_tipos.index', compact('actuaciontipos'));
	}

	/**
	 * Show the form for creating a new actuaciontipo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.actuacion_tipos.create');
	}

	/**
	 * Store a newly created actuaciontipo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), ActuacionTipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		ActuacionTipo::create($data);

		return Redirect::route('admin.actuaciontipos.index')->with('message_store',true);;
	}

	/**
	 * Display the specified actuaciontipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$actuaciontipo = ActuacionTipo::findOrFail($id);

		return View::make('admin.actuacion_tipos.show', compact('actuaciontipo'));
	}

	/**
	 * Show the form for editing the specified actuaciontipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$actuaciontipo = ActuacionTipo::find($id);

		return View::make('admin.actuacion_tipos.edit', compact('actuaciontipo'));
	}

	/**
	 * Update the specified actuaciontipo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$actuaciontipo = ActuacionTipo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), ActuacionTipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$actuaciontipo->update($data);

		return Redirect::back()->with('message',true);
	}

	/**
	 * Remove the specified actuaciontipo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ActuacionTipo::destroy($id);

		return Redirect::route('admin.actuaciontipos.index')->with('message_destroy',true);;
	}

}
