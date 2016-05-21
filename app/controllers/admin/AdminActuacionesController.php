<?php

class AdminActuacionesController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_actuaciones', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_actuaciones', array('only' => 'create') );
        $this->beforeFilter('crear_actuaciones', array('only' => 'store') );
        $this->beforeFilter('editar_actuaciones', array('only' => 'edit') );
        $this->beforeFilter('editar_actuaciones', array('only' => 'update') );
        $this->beforeFilter('eliminar_actuaciones', array('only' => 'destroy') );
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
		$instancias = $proceso->instancias;
		return View::make('admin.actuaciones.create', compact('proceso','instancias'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($proceso_id)
	{
		// var_dump($proceso_id);
		$validator = Validator::make($data = Input::all(), Actuacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$proceso = Proceso::with('actuaciones')->findOrFail($proceso_id);

		$data_actuacion = array(
			'instancia_id' => Input::get('instancia_id'),
			'publicacion_id' => Input::get('publicacion_id'),
			'fecha_publicacion' => Input::get('fecha_publicacion'),
			'fecha_auto' => Input::get('fecha_auto'),
			'etapa_id' => Input::get('etapa_id'),
			'actuacion_tipo_id' => Input::get('actuacion_tipo_id'),
			'resumen' => Input::get('resumen'),
			'fecha_audiencia' => Input::get('fecha_audiencia'),
		);

		$actuacion = new Actuacion($data_actuacion);
		$proceso->actuaciones()->save($actuacion);

		if (Input::hasFile('pdf'))
		{
		  $file = Input::file('pdf');
		  $name = "actuacion_".$actuacion->id.".".$file->getClientOriginalExtension();
		  $file->move(app_path().'/uploads/autos', $name);

		  $actuacion = Actuacion::findOrFail($actuacion->id);
			$actuacion->pdf = $name;
			$actuacion->save();
		}

		// $instancia = Instancia::create($data_instancia);


		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_store_actuacion', true);
		// return Redirect::to(URL::route('admin.procesos.edit', $proceso_id)->with('message_store_instancia', true));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($proceso_id,$id)
	{
		$actuacion = Actuacion::findOrFail($id);

		$file = app_path().'/uploads/autos/'.$actuacion->pdf;

		if (file_exists($file)) {
		    $content = file_get_contents($file);
		    return Response::make($content, 200, array('content-type'=>'application/pdf'));

		    /*return Response::make($content, 200, [
			    'Content-Type' => 'application/pdf',
			    'Content-Disposition' => 'inline; '.$file,
			]);*/

		}

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($proceso_id, $id)
	{
		$proceso = Proceso::with('actuaciones')->findOrFail($proceso_id);
        $actuacion = Actuacion::findOrFail($id);
        $instancias = $proceso->instancias;

        return View::make('admin.actuaciones.edit', compact('proceso','instancias','actuacion'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($proceso_id, $id)
	{
		$actuacion = Actuacion::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Actuacion::$rules_update);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('pdf'))
		{

			$file_delete = 'uploads/autos/'.$actuacion->pdf;
			File::delete($file_delete);

		    $file = Input::file('pdf');
		    $name = "actuacion_".$actuacion->id.".".$file->getClientOriginalExtension();
		    $file->move(app_path().'/uploads/autos', $name);

			$actuacion->pdf = $name;
			$actuacion->save();
		}

		$data_actuacion = array(
			'instancia_id' => Input::get('instancia_id'),
			'publicacion_id' => Input::get('publicacion_id'),
			'fecha_publicacion' => Input::get('fecha_publicacion'),
			'fecha_auto' => Input::get('fecha_auto'),
			'etapa_id' => Input::get('etapa_id'),
			'actuacion_tipo_id' => Input::get('actuacion_tipo_id'),
			'resumen' => Input::get('resumen'),
			'fecha_audiencia' => Input::get('fecha_audiencia'),
		);

		$actuacion->fill($data_actuacion);
		$actuacion->save();

		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_update_actuacion', true);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($proceso_id, $id)
	{
		$buscar = Actuacion::findOrFail($id);
		$file_delete = 'uploads/autos/'.$buscar->pdf;
		File::delete($file_delete);

		Actuacion::destroy($id);

		return Redirect::route('admin.procesos.edit', $proceso_id)->with('message_destroy_actuacion', true);
	}

}
