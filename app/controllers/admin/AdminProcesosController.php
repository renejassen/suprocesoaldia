<?php

class AdminProcesosController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_procesos', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_procesos', array('only' => 'create') );
        $this->beforeFilter('crear_procesos', array('only' => 'store') );
        $this->beforeFilter('editar_procesos', array('only' => 'edit') );
        $this->beforeFilter('editar_procesos', array('only' => 'update') );
        $this->beforeFilter('eliminar_procesos', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of procesos
	 *
	 * @return Response
	 */
	public function index()
	{
		$procesos = Proceso::all();

		return View::make('admin.procesos.index', compact('procesos'));
	}

	/**
	 * Show the form for creating a new proceso
	 *
	 * @return Response
	 */
	public function create()
	{
		$procesotipos = ProcesoTipo::all();
		return View::make('admin.procesos.create', compact('procesotipos'));
	}

	/**
	 * Store a newly created proceso in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Proceso::$rules);

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

		$proceso_data = array(
            "proceso_tipo_id" => Input::get("proceso_tipo_id"),
        );

		$proceso = Proceso::create($proceso_data);

		$instancia_data = array(
            "proceso_id" => $proceso->id,
            "departamento_id" => Input::get("departamento_id"),
            "municipio_id" => Input::get("municipio_id"),
            "despacho_id" => Input::get("despacho_id"),      
            "radicado" => Input::get("radicado"),
            "user_id" => Auth::user()->id
        );

        // $punto->imagens()->save($imagen);

		$instancia = Instancia::create($instancia_data);

		return Redirect::route('admin.procesos.edit', $proceso->id);
	}

	/**
	 * Display the specified proceso.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$proceso = Proceso::findOrFail($id);

		$instancias = $proceso->instancias;
		$actores = $proceso->actores;
		$actuaciones = $proceso->actuaciones;
		$clientes = Cliente::lists('empresa','id');

		return View::make('admin.procesos.show', compact('proceso', 'instancias', 'actores', 'clientes','actuaciones'));
		// return View::make('admin.procesos.show', compact('proceso','instancias'));
	}

	/**
	 * Show the form for editing the specified proceso.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$proceso = Proceso::find($id);
		$instancias = $proceso->instancias;
		$actores = $proceso->actores;
		$actuaciones = $proceso->actuaciones;
		$clientes = Cliente::lists('empresa','id');

		return View::make('admin.procesos.edit', compact('proceso', 'instancias', 'actores', 'clientes','actuaciones'));
	}

	/**
	 * Update the specified proceso in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$proceso = Proceso::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Proceso::$rules_update);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data_proceso = array(
			'proceso_tipo_id' => Input::get('proceso_tipo_id'),
		);

		$proceso->update($data_proceso);
		$proceso->clientes()->sync(Input::get('cliente_lista'));

		return Redirect::back()->with('message', true);
	}

	/**
	 * Update the specified proceso in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateAdicional($id)
	{
		$proceso = Proceso::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Proceso::$rules_update_adicional);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$proceso->update($data);

		return Redirect::back()->with('message', true);
	}

	/**
	 * Update the specified proceso in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateCliente($id)
	{
		$proceso = Proceso::findOrFail($id);
		$proceso->clientes()->sync(Input::get('clientes_lista'));

		$instancias = $proceso->instancias;
		$actores = $proceso->actores;
		$clientes = Cliente::lists('empresa','id');

		return View::make('admin.procesos.edit', compact('proceso', 'instancias', 'actores', 'clientes'))->with('message_update_cliente', true);
	}

	/**
	 * Remove the specified proceso from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Proceso::destroy($id);

		return Redirect::route('admin.procesos.index');
	}

	/**
	 * Display form generate list procesos
	 *
	 * @return Response
	 */
	public function getList()
	{
		$cliente_id = Auth::user()->tipo_id;

		if($cliente_id > 0) {
			
		}
		else {
			$resultados = Proceso::all();
			return View::make('admin.procesos.list', compact(''));
		}
	}

	/**
	 * generate list procesos in excel.
	 *
	 * @return Response
	 */
	public function postList()
	{
		$validator = Validator::make($data = Input::all(), Proceso::$rules_list);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$departamento_id = Input::get('departamento_id');
		$municipio_id = Input::get('municipio_id');
		// $rama_id = Input::get('rama_id');

		$resultados = DB::table('procesos')
				 ->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
         		 ->where('instancias.municipio_id','=',$municipio_id)
                 ->select( 'instancias.id',
                 		   'instancias.proceso_id',
                 		   'instancias.radicado',
                 		   'instancias.municipio_id',
                 		   'instancias.despacho_id'
                 		 )
                 ->orderBy('despacho_id','asc')
                 ->get();

        function getDemandante($id){
	    	$demandados = Actor::where('proceso_id', $id)->where('actor_tipo_id','1')->get();
	    	$count = $demandados->count();
	    	$nombre = '';

    		foreach ($demandados as $demandado)
    		{
    			if($count>1)
    			{
    				$nombre .= $demandado->nombre . " - ";
    			}
    			else
    			{
    				$nombre = $demandado->nombre;
    			}
    		}

    		return $nombre;
	    }

	    function getDemandado($id){
	    	$demandados = Actor::where('proceso_id', $id)->where('actor_tipo_id','2')->get();
	    	$count = $demandados->count();
	    	$nombre = '';

    		foreach ($demandados as $demandado)
    		{
    			if($count>1)
    			{
    				$nombre .= $demandado->nombre . " - ";
    			}
    			else
    			{
    				$nombre = $demandado->nombre;
    			}
    		}

    		return $nombre;
	    }

        $data = array();

        foreach ($resultados as $resultado) 
	    {
	        array_push( $data, 
	        	array(
	        		$resultado->proceso_id,
	        		$resultado->radicado,
	        		Municipio::where('id', $resultado->municipio_id)->pluck('nombre'),
	        		Despacho::where('id',$resultado->despacho_id)->pluck('nombre'),
	        		getDemandante($resultado->proceso_id),
	        		getDemandado($resultado->proceso_id),
	        	)
	        );
	    }

        Excel::create('Listado de procesos', function($excel) use($data) 
        {
            $excel->sheet('Listado', function($sheet) use($data) 
            {
            	$sheet->setStyle(array(
				    'font' => array(
				        'name'      =>  'Calibri',
				        'size'      =>  12
				    )
				));

                $sheet->fromArray($data, null, 'A1', false, false);
            });
        })->export('xls');


	}

	/**
	 * generate client list procesos in excel.
	 *
	 * @return Response
	 */
	public function clientList($id)
	{
		$nombre_cliente = Cliente::find($id);

		$resultados = DB::table('cliente_proceso')
				->join('instancias', 'instancias.proceso_id', '=', 'cliente_proceso.proceso_id')
				->where('cliente_id',$id)
				->select( 'instancias.id',
                 		  'instancias.proceso_id',
                 		  'instancias.radicado',
                 		  'instancias.municipio_id',
                 		  'instancias.despacho_id'
                 		 )
                ->orderBy('despacho_id','asc')
                ->get();

        function getDemandante($id){
	    	$demandados = Actor::where('proceso_id', $id)->where('actor_tipo_id','1')->get();
	    	$count = $demandados->count();
	    	$nombre = '';

    		foreach ($demandados as $demandado)
    		{
    			if($count>1)
    			{
    				$nombre .= $demandado->nombre . " - ";
    			}
    			else
    			{
    				$nombre = $demandado->nombre;
    			}
    		}

    		return $nombre;
	    }

	    function getDemandado($id){
	    	$demandados = Actor::where('proceso_id', $id)->where('actor_tipo_id','2')->get();
	    	$count = $demandados->count();
	    	$nombre = '';

    		foreach ($demandados as $demandado)
    		{
    			if($count>1)
    			{
    				$nombre .= $demandado->nombre . " - ";
    			}
    			else
    			{
    				$nombre = $demandado->nombre;
    			}
    		}

    		return $nombre;
	    }

	    function getUltimaActuacion($id){
	    	$resumen = Actuacion::where('instancia_id', $id)->orderBy('fecha_publicacion','desc')->pluck('resumen');

			return $resumen;
	    }

        $data = array();

        foreach ($resultados as $resultado) 
	    {
	        array_push( $data, 
	        	array(
	        		$resultado->proceso_id,
	        		$resultado->radicado,
	        		Municipio::where('id', $resultado->municipio_id)->pluck('nombre'),
	        		Despacho::where('id',$resultado->despacho_id)->pluck('nombre'),
	        		getDemandante($resultado->proceso_id),
	        		getDemandado($resultado->proceso_id),
	        		Actuacion::where('proceso_id', $resultado->proceso_id)
	        				->where('instancia_id',$resultado->id)
	        				->orderBy('fecha_publicacion', 'desc')
	        				->pluck('fecha_publicacion'),
	        		Actuacion::where('proceso_id', $resultado->proceso_id)
	        				->where('instancia_id',$resultado->id)
	        				->orderBy('fecha_publicacion', 'desc')
	        				->pluck('resumen'),
	        	)
	        );
	    }
	    
        Excel::create('Listado de procesos '.$nombre_cliente->empresa, function($excel) use($data) 
        {
            $excel->sheet('Listado', function($sheet) use($data) 
            {
            	$sheet->setStyle(array(
				    'font' => array(
				        'name'      =>  'Calibri',
				        'size'      =>  12
				    )
				));

                $sheet->fromArray($data, null, 'A1', false, false);
            });
        })->export('xls');


	}

	/**
	 * Show the form for search a proceso
	 *
	 * @return Response
	 */
	public function getSearch()
	{
		$cliente_id = Auth::user()->tipo_id;

		if($cliente_id > 0) {
			$query = DB::table('procesos')->join('cliente_proceso', 'procesos.id', '=', 'cliente_proceso.proceso_id')
             ->join('clientes', 'cliente_proceso.cliente_id', '=', 'clientes.id')
             ->where('cliente_proceso.cliente_id',$cliente_id)
             ->select('procesos.id');

            $resultados = $query->get();
            $count = $query->count();

            return View::make('admin.procesos.search', compact('resultados','count'));
		}
		else {
			$resultados = Proceso::all();
			return View::make('admin.procesos.search', compact('resultados'));
		}

		
	}

	/**
	 * Show results
	 *
	 * @return Response
	 */
	public function postSearch()
	{	
		$id = Input::get('id');
		$radicado = Input::get('radicado');
		$demandante = Input::get('demandante');
		$demandado = Input::get('demandado');
		$departamento_id = Input::get('departamento_id');
		$municipio_id = Input::get('municipio_id');
		$despacho_id = Input::get('despacho_id');

		$cliente_id = Auth::user()->tipo_id;

		if($cliente_id > 0){
			$query = DB::table('procesos')->join('cliente_proceso', 'procesos.id', '=', 'cliente_proceso.proceso_id')
             ->join('clientes', 'cliente_proceso.cliente_id', '=', 'clientes.id')
             ->where('cliente_proceso.cliente_id',$cliente_id);
		}
		else{
			$query = DB::table('procesos');
		}
		

		if($id){
			if($cliente_id > 0){
				$query->where('procesos.id',$id)
            		->select('procesos.id');
			}

			else {
				$query->where('id','=',$id);	
			}
		}

		elseif ($radicado && $demandante && $demandado && $municipio_id && $despacho_id) {
			// dd('radicado-demandante-demandado-municipio-despacho');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
             		->where('actores.nombre','like',"%$demandado%")
             		->orWhere('actores.actor_tipo_id','=','2')
             		->where('instancias.radicado','=',$radicado)
             		->where('instancias.despacho_id','=',$despacho_id)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->where('despacho_id','=',$despacho_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							foreach ($instancias as $instancia) {
								if($instancia->proceso_id == $demandado->proceso_id){
									$query->orWhere('id','=',$instancia->proceso_id);
								}
							}
						}
					}
				}
			}
		}

		elseif ($radicado && $demandante && $demandado && $municipio_id) {
			// dd('radicado-demandante-demandado-municipio');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
             		->where('actores.nombre','like',"%$demandado%")
             		->orWhere('actores.actor_tipo_id','=','2')
             		->where('instancias.radicado','=',$radicado)
             		->where('instancias.municipio_id','=',$municipio_id)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->where('municipio_id','=',$municipio_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							foreach ($instancias as $instancia) {
								if($instancia->proceso_id == $demandado->proceso_id){
									$query->orWhere('id','=',$instancia->proceso_id);
								}
							}
						}
					}
				}
			}
		}

		elseif ($radicado && $demandante && $demandado) {
			// dd('radicado-demandante-demandado');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
             		->where('actores.nombre','like',"%$demandado%")
             		->orWhere('actores.actor_tipo_id','=','2')
             		->where('instancias.radicado','=',$radicado)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							foreach ($instancias as $instancia) {
								if($instancia->proceso_id == $demandado->proceso_id){
									$query->orWhere('id','=',$instancia->proceso_id);
								}
							}
						}
					}
				}
			}
			

		}

		elseif ($radicado && $demandante) {
			// dd('radicado-demandante');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.radicado','=',$radicado)
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				
				foreach ($instancias as $instancia) {
					foreach ($demandantes as $demandante) {
						if($instancia->proceso_id == $demandante->proceso_id){
							$query->orWhere('id','=',$instancia->proceso_id);
						}
					}
				}
			}
		}

		elseif ($radicado && $demandado) {
			// dd('radicado-demandado');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.radicado','=',$radicado)
             		->where('actores.nombre','like',"%$demandado%")
             		->where('actores.actor_tipo_id','=','2')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($instancias as $instancia) {
					foreach ($demandados as $demandado) {
						if($instancia->proceso_id == $demandado->proceso_id){
							$query->orWhere('id','=',$instancia->proceso_id);
						}
					}
				}
			}
		}

		elseif ($radicado && $municipio_id && $despacho_id) {
			// dd('radicado-despacho');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
             		->where('instancias.radicado','=',$radicado)
             		->where('instancias.despacho_id','=',$despacho_id)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->where('despacho_id',$despacho_id)->get();
				foreach ($instancias as $instancia) {
					$query->orWhere('id','=',$instancia->proceso_id);
				}
			}
		}

		elseif ($radicado && $municipio_id) {
			// dd('radicado-municipio');
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
             		->where('instancias.radicado','=',$radicado)
             		->where('instancias.municipio_id','=',$municipio_id)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->where('municipio_id',$municipio_id)->get();
				foreach ($instancias as $instancia) {
					$query->orWhere('id','=',$instancia->proceso_id);
				}
			}
			
		}

		elseif ($radicado) {
			// dd('radicado');
			if($cliente_id > 0){
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
             		->where('instancias.radicado','=',$radicado)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('radicado','=', $radicado)->get();
				foreach ($instancias as $instancia) {
					$query->orWhere('id','=',$instancia->proceso_id);
				}
			}
			
		}

		elseif ($demandante && $demandado && $municipio_id && $despacho_id) {
			if($cliente_id > 0) {
				$instancias = Instancia::where('despacho_id','=', $despacho_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				//voy aqui
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							foreach ($instancias as $instancia) {
								if($instancia->proceso_id == $demandado->proceso_id){
									$query->where('procesos.id','=',$instancia->proceso_id)
									->select('procesos.id');
								}
							}
						}
					}
				}
			}
			else {
				$instancias = Instancia::where('despacho_id','=', $despacho_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							foreach ($instancias as $instancia) {
								if($instancia->proceso_id == $demandado->proceso_id){
									$query->orWhere('id','=',$instancia->proceso_id);
								}
							}
						}
					}
				}
			}
		}

		elseif($demandante && $demandado && $municipio_id){
			$dte = $demandante;
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.municipio_id','=',$municipio_id)
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
             		->where('actores.nombre','like',"%$demandado%")
             		->orWhere('actores.actor_tipo_id','=','2')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('municipio_id','=', $municipio_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							foreach ($instancias as $instancia) {
								if($instancia->proceso_id == $demandado->proceso_id){
									$query->orWhere('id','=',$instancia->proceso_id);
								}
							}
						}
					}
				}
			}
		}

		elseif ($demandante && $demandado) {
			if($cliente_id > 0) {
				$query->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
             		->where('actores.nombre','like',"%$demandado%")
             		->orWhere('actores.actor_tipo_id','=','2')
            		->select('procesos.id');
			}
			else {
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($demandantes as $demandante) {
					foreach ($demandados as $demandado) {
						if($demandante->proceso_id == $demandado->proceso_id){
							$query->orWhere('id','=',$demandante->proceso_id);
						}
					}
				}
			}
		}

		elseif ($demandante && $municipio_id && $despacho_id) {
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.despacho_id','=',$despacho_id)
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('despacho_id','=', $despacho_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				
				foreach ($demandantes as $demandante) {
					foreach ($instancias as $instancia) {
						if($instancia->proceso_id == $demandante->proceso_id){
							$query->orWhere('id','=',$instancia->proceso_id);
						}
					}
				}
			}
		}

		elseif ($demandante && $municipio_id) {
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.municipio_id','=',$municipio_id)
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('municipio_id','=', $municipio_id)->get();
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
				
				foreach ($demandantes as $demandante) {
					foreach ($instancias as $instancia) {
						if($instancia->proceso_id == $demandante->proceso_id){
							$query->orWhere('id','=',$instancia->proceso_id);
						}
					}
				}
			}
		}

		elseif($demandante){
			if($cliente_id > 0) {
				$query->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('actores.nombre','like',"%$demandante%")
             		->where('actores.actor_tipo_id','=','1')
            		->select('procesos.id');
			}
			else {
				$demandantes = Actor::where("nombre","like", "%$demandante%")->where('actor_tipo_id','1')->get();
			
				foreach ($demandantes as $demandante) {
						$query->orWhere('id','=',$demandante->proceso_id);
				}
			}
			
		}

		elseif ($demandado && $municipio_id && $despacho_id) {
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.despacho_id','=',$despacho_id)
             		->where('actores.nombre','like',"%$demandado%")
             		->where('actores.actor_tipo_id','=','2')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('despacho_id','=', $despacho_id)->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($demandados as $demandado) {
					foreach ($instancias as $instancia) {
						if($instancia->proceso_id == $demandado->proceso_id){
							$query->orWhere('id','=',$instancia->proceso_id);
						}
					}
				}
			}
		}

		elseif ($demandado && $municipio_id) {
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
					->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('instancias.municipio_id','=',$municipio_id)
             		->where('actores.nombre','like',"%$demandado%")
             		->where('actores.actor_tipo_id','=','2')
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('municipio_id','=', $municipio_id)->get();
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($demandados as $demandado) {
					foreach ($instancias as $instancia) {
						if($instancia->proceso_id == $demandado->proceso_id){
							$query->orWhere('id','=',$instancia->proceso_id);
						}
					}
				}
			}
		}
		
		elseif ($demandado) {
			if($cliente_id > 0) {
				$query->join('actores', 'procesos.id', '=', 'actores.proceso_id')
             		->where('actores.nombre','like',"%$demandado%")
             		->where('actores.actor_tipo_id','=','2')
            		->select('procesos.id');
			}
			else {
				$demandados = Actor::where("nombre","like", "%$demandado%")->where('actor_tipo_id','2')->get();
				
				foreach ($demandados as $demandado) {
						$query->orWhere('id','=',$demandado->proceso_id);
				}
			}
		}

		elseif ($municipio_id && $despacho_id) {
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
             		->where('instancias.municipio_id','=',$municipio_id)
             		->where('instancias.despacho_id','=',$despacho_id)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('despacho_id','=', $despacho_id)->get();
				
				foreach ($instancias as $instancia) {
						$query->orWhere('id','=',$instancia->proceso_id);
				}
			}
		}
		

		elseif ($municipio_id) {
			if($cliente_id > 0) {
				$query->join('instancias', 'procesos.id', '=', 'instancias.proceso_id')
             		->where('instancias.municipio_id','=',$municipio_id)
            		->select('procesos.id');
			}
			else {
				$instancias = Instancia::where('municipio_id','=', $municipio_id)->get();
				
				foreach ($instancias as $instancia) {
						$query->orWhere('id','=',$instancia->proceso_id);
				}
			}
		}

		else {
			if($cliente_id > 0) {
				$query->select('procesos.id');
			}
			else {
			}
		}

		$resultados = $query->get();
		$count = $query->count();


		return View::make('admin.procesos.searchresult', compact('resultados','count'));
		
	}

}
