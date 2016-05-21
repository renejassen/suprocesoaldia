
<?php

class AdminActoresController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_actores', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_actores', array('only' => 'create') );
        $this->beforeFilter('crear_actores', array('only' => 'store') );
        $this->beforeFilter('editar_actores', array('only' => 'edit') );
        $this->beforeFilter('editar_actores', array('only' => 'update') );
        $this->beforeFilter('eliminar_actores', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($proceso_id)
	{
		$proceso = Proceso::findOrFail($proceso_id);
		return View::make('admin.actores.create', compact('proceso'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($proceso_id)
	{
		$validator = Validator::make($data = Input::all(), Actor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $proceso = proceso::find($proceso_id);
		$proceso = Proceso::with('actores')->findOrFail($proceso_id);
		$actor = new Actor(Input::all());
		$proceso->actores()->save($actor);


		return Redirect::route('admin.procesos.edit', array($proceso_id, '#actores'))->with('message_store_actor', true);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($proceso_id, $id)
	{
		$proceso = Proceso::with('actores')->findOrFail($proceso_id);
        $actor = Actor::findOrFail($id);
        
        return View::make('admin.actores.edit', compact('actor','proceso'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($proceso_id, $id)
	{
		$actor = Actor::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Actor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $actor->update($data);

		$actor->fill(Input::all());
		$actor->save();

		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_update_actor', true);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($proceso_id, $id)
	{
		Actor::destroy($id);

		/*$proceso = Proceso::with('actores')->findOrFail($proceso_id);
        $actores = $proceso->actores;*/
        
		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_destroy_actor', true);
	}


}
