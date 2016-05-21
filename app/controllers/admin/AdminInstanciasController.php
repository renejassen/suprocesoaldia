<?php

class AdminInstanciasController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_instancias', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_instancias', array('only' => 'create') );
        $this->beforeFilter('crear_instancias', array('only' => 'store') );
        $this->beforeFilter('editar_instancias', array('only' => 'edit') );
        $this->beforeFilter('editar_instancias', array('only' => 'update') );
        $this->beforeFilter('eliminar_instancias', array('only' => 'destroy') );
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
		return View::make('admin.instancias.create', compact('proceso'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($proceso_id)
	{
		var_dump($proceso_id);
		$validator = Validator::make($data = Input::all(), Instancia::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$instancia_existe = Instancia::where('radicado',Input::get('radicado'))
									->where('despacho_id',Input::get('despacho_id'))
									->first();


		if($instancia_existe) {
			return Redirect::back()->with('message_error',true)->with('proceso',$instancia_existe->proceso_id);
		}

		$proceso = Proceso::with('instancias')->findOrFail($proceso_id);
		$instancia = new Instancia(Input::all());
		$instancia->user_id = Auth::user()->id;
		$proceso->instancias()->save($instancia);

		// $instancia = Instancia::create($data_instancia);

		
		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_store_instancia', true);
		// return Redirect::to(URL::route('admin.procesos.edit', $proceso_id)->with('message_store_instancia', true));
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
		$proceso = Proceso::with('instancias')->findOrFail($proceso_id);
        $instancia = Instancia::findOrFail($id);
        
        return View::make('admin.instancias.edit', compact('instancia','proceso'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($proceso_id, $id)
	{
		$instancia = Instancia::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Instancia::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$instancia->fill(Input::all());
		$instancia->save();

		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_update_instancia', true);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($proceso_id, $id)
	{
		Instancia::destroy($id);
        
		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_destroy_instancia', true);
	}


}
