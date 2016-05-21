<?php

class AdminCartelerasController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_cartelera', array('only' => 'index') );
        $this->beforeFilter('crear_cartelera', array('only' => 'create') );
        $this->beforeFilter('crear_cartelera', array('only' => 'store') );
        $this->beforeFilter('editar_cartelera', array('only' => 'edit') );
        $this->beforeFilter('editar_cartelera', array('only' => 'update') );
        $this->beforeFilter('eliminar_cartelera', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of carteleras
	 *
	 * @return Response
	 */
	public function index()
	{
		$carteleras = Cartelera::All();

		return View::make('admin.carteleras.index', compact('carteleras'));
	}

	/**
	 * Show the form for creating a new cartelera
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.carteleras.create');
	}

	/**
	 * Store a newly created cartelera in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Cartelera::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('pdf'))
		{
			$file = Input::file('pdf');

			if ($file->getClientOriginalExtension() != 'pdf')
			{
				return Redirect::back()->withInput()->with('message_fail', true);
			}
		}
		// else {
		// 	return Redirect::back()->withInput()->with('message_fail', true);
		// }

		$data_cartelera = array(
			'departamento_id' => Input::get('departamento_id'),
			'municipio_id' => Input::get('municipio_id'),
			'rama_id' => Despacho::where('id',Input::get('despacho_id'))->pluck('rama_id'),
			'despacho_id' => Input::get('despacho_id'),
			'estado' => '2',
			'user_id' => Auth::user()->id,
			'fecha_publicacion' => Input::get('fecha_publicacion'),
		);

		$cartelera = new Cartelera($data_cartelera);
		$cartelera->save();

		if (Input::hasFile('pdf'))
		{
		    $file = Input::file('pdf');
		    $name = "cartelera_".$cartelera->id."_".$cartelera->fecha_publicacion.".".$file->getClientOriginalExtension();
		    $file->move(app_path().'/uploads/carteleras', $name);

		    $cartelera = Cartelera::findOrFail($cartelera->id);
			$cartelera->estado = '1';
			$cartelera->pdf = $name;
			$cartelera->save();
		}

		return Redirect::back()->with('message', true);
	}

	/**
	 * Display the specified cartelera.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cartelera = Cartelera::findOrFail($id);

		$file = app_path().'/uploads/carteleras/'.$cartelera->pdf;
		if (file_exists($file)) {
		    $content = file_get_contents($file);
		    return Response::make($content, 200, array('content-type'=>'application/pdf'));
		}
	}

	/**
	 * Display a search of carteleras
	 *
	 * @return Response
	 */
	public function getSearch()
	{
		$carteleras = array();

		return View::make('admin.carteleras.search', compact('carteleras'));
	}

	/**
	 * Display a results of carteleras
	 *
	 * @return Response
	 */

	public function postSearch(){

	    $validator = Validator::make($data = Input::all(), Cartelera::$rules_search);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data_search = array(
			'fecha_publicacion' => Input::get('fecha_publicacion'),
			'rama_id' => Input::get('rama_id'),
		);

		$fecha_publicacion = Input::get('fecha_publicacion');
		$rama_id = Input::get('rama_id');
		$departamento_id = Input::get('departamento_id');
		$municipio_id = Input::get('municipio_id');
		$despacho_id = Input::get('despacho_id');


		if ($departamento_id && $municipio_id && $despacho_id && $rama_id ) {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->where('despacho_id', $despacho_id)
					->where('rama_id', $rama_id)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		elseif ($departamento_id && $municipio_id && $despacho_id) {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->where('despacho_id', $despacho_id)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		elseif ($departamento_id && $municipio_id) {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->where('municipio_id', $municipio_id)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		elseif ($departamento_id && $rama_id) {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->where('departamento_id', $departamento_id)
					->where('rama_id', $rama_id)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		elseif ($departamento_id) {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->where('departamento_id', $departamento_id)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		elseif ($rama_id) {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->where('rama_id', $rama_id)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		else {
			$carteleras = Cartelera::where('fecha_publicacion', $fecha_publicacion)
					->orderBy('despacho_id', 'asc')
					->get();
		}

		return View::make('admin.carteleras.search', compact('carteleras'));

	}

	
	public function showPublicacion($despacho_id,$fecha)
	{
		// $cartelera = Cartelera::findOrFail($id);
		$cartelera = Cartelera::where('despacho_id', $despacho_id)
						->where('fecha_publicacion',$fecha)->first();

		if($cartelera){

			$file = app_path().'/uploads/carteleras/'.$cartelera->pdf;
			if (file_exists($file)) {
			    $content = file_get_contents($file);
			    return Response::make($content, 200, array('content-type'=>'application/pdf'));
			}

		}
		else {
			return 'No hay publicaciones';
		}
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function getReport()
	{
		return View::make('admin.carteleras.report');
	}

	/**
	 * Display a report of carteleras
	 *
	 * @return Response
	 */

	public function postReport()
	{

	    $validator = Validator::make($data = Input::all(), Cartelera::$rules_report);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$carteleras = Cartelera::where('pdf', '')
				->where('fecha_publicacion', Input::get('fecha_publicacion'))
				->orderBy('despacho_id', 'asc')
				->get();	

		return View::make('admin.carteleras.reportsearch', compact('carteleras'));
	}


	// Cartelera::where('despacho_id', '=', Instancia::where('id',$actuacion->instancia_id)->pluck('despacho_id'))
 //            ->orWhere(function($query)
 //            {
 //                $query->where('votes', '>', 100)
 //                      ->where('title', '<>', 'Admin');
 //            })
 //            ->get();

    

	/**
	 * Show the form for editing the specified cartelera.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cartelera = Cartelera::find($id);

		return View::make('admin.carteleras.edit', compact('cartelera'));
	}

	/**
	 * Update the specified cartelera in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cartelera = Cartelera::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Cartelera::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('pdf'))
		{
			$file = Input::file('pdf');

			if ($file->getClientOriginalExtension() != 'pdf')
			{
				return Redirect::back()->with('message_fail', true);
			}
		}

		$data_cartelera = array(
			'departamento_id' => Input::get('departamento_id'),
			'municipio_id' => Input::get('municipio_id'),
			'rama_id' => Despacho::where('id',Input::get('despacho_id'))->pluck('rama_id'),
			'despacho_id' => Input::get('despacho_id'),
			'estado' => '2',
			'user_id' => Auth::user()->id,
			'fecha_publicacion' => Input::get('fecha_publicacion'),
		);

		$cartelera->update($data_cartelera);

		if (Input::hasFile('pdf'))
		{
			$file_delete = 'uploads/carteleras/'.$cartelera->pdf;
			File::delete($file_delete);

		    $file = Input::file('pdf');
		    $name = "cartelera_".$cartelera->id."_".$cartelera->fecha_publicacion.".".$file->getClientOriginalExtension();
		    $file->move(app_path().'/uploads/carteleras', $name);

			$cartelera->estado = '1';
			$cartelera->pdf = $name;
			$cartelera->save();
		}

		return Redirect::back()->with('message', true);
	}

	/**
	 * Remove the specified cartelera from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cartelera::destroy($id);

		return Redirect::route('admin.carteleras.index');
	}

	public function crearDespacho(){
		if(Request::ajax()){
		    $registerData = array(
		    	'municipio_id' => Input::get('municipio_id'),
		    	'rama_id'      =>    Input::get('rama_id'),
		        'nombre'    =>    Input::get('nombre'),
		    );
		        
		    $rules = array(
		    	'municipio_id' => 'required',
		    	'rama_id' => 'required|not_in:0',
		        'nombre'     	=> 'required|min:2|max:100',
		    );
		        
		    $messages = array(
		        'required'    	=> 'El campo :attribute es obligatorio.',
		        'min'         	=> 'El campo :attribute no puede tener menos de :min carácteres.',
		        'email'     	=> 'El campo :attribute debe ser un email válido.',
		        'max'         	=> 'El campo :attribute no puede tener más de :min carácteres.',
		        'unique'     	=> 'El email ingresado ya está registrado en la base de datos.',
		        'confirmed' 	=> 'Los passwords no coinciden.',
		        'not_in' 	=> 'Debe seleccionar :attribute',
		    );
		        
		    $validation = Validator::make(Input::all(), $rules, $messages);
		    if ($validation->fails())
		    {
				return Response::json(array(
				    'success' => false,
				    'errors' => $validation->getMessageBag()->toArray()
				)); 
		    }else{
		        $despacho = new Despacho($registerData);
		        $despacho->save(); 
		        if($despacho)
		        {
		            return Response::json(array(
					    'success' 		=> 	true,
					    'message' 		=> 	'Despacho creado con exito!'
					));
				}
		    }
		}
	}

}
