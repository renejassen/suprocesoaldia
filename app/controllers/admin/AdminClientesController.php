<?php

class AdminClientesController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_clientes', array('only' => 'index', 'show') );
        $this->beforeFilter('crear_clientes', array('only' => 'create') );
        $this->beforeFilter('crear_clientes', array('only' => 'store') );
        $this->beforeFilter('editar_clientes', array('only' => 'edit') );
        $this->beforeFilter('editar_clientes', array('only' => 'update') );
        $this->beforeFilter('eliminar_clientes', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of clientes
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::all();

		return View::make('admin.clientes.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new cliente
	 *
	 * @return Response
	 */
	public function create()
	{
		$servicios = Servicio::lists('servicio','id');

		return View::make('admin.clientes.create', compact('servicios'));
	}

	/**
	 * Store a newly created cliente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Cliente::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data_cliente = array(
			'empresa' => Input::get('empresa'),
			'nit' => Input::get('nit'),
			'cargo' => Input::get('cargo'),
			'nombres' => Input::get('nombres'),
			'apellidos' => Input::get('apellidos'),
			'telefono' => Input::get('telefono'),
			'celular' => Input::get('celular'),
			'direccion' => Input::get('direccion'),
		);

		$cliente = Cliente::create($data_cliente);
		$cliente->servicios()->attach(Input::get('servicio_lista'));

		$data_user = array(
			'estado_id' => 1,
			'tipo_id' => $cliente->id,
			'first_name' => Input::get('nombres'),
			'last_name' => Input::get('apellidos'),
			'email' => Input::get('email'),
		  'password' => Hash::make(Input::get('nit')),
		);

		$user = User::create($data_user);
		$user->attachRole(5, $user->id);

		return Redirect::route('admin.clientes.index')->with('message_store', true);
	}

	/**
	 * Display the specified cliente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cliente = Cliente::findOrFail($id);

		// $cliente->hasRole("Owner");

		// $servicios = Servicio::lists('servicio','id');
		$servicios = $cliente->servicios()->get();

		$user = User::where('tipo_id', $id)->first();

		if($user->estado_id == 1){
			$user_estado = '<i class="fa fa-thumbs-o-up"></i> <span class="label label-default">Procesando</span>';
		}
		else if($user->estado_id == 2){
			$user_estado = '<i class="fa fa-thumbs-o-up"></i> <span class="label label-info">Activo</span>';
		}
		else if($user->estado_id == 3){
			$user_estado = '<i class="fa fa-thumbs-o-down"></i> <span class="label label-warning">Suspendido</span>';
		}

		return View::make('admin.clientes.show', compact('cliente', 'servicios', 'user', 'user_estado'));


	}

	/**
	 * Show the form for editing the specified cliente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cliente = Cliente::find($id);

		$servicios = Servicio::lists('servicio','id');

		$user = User::where('tipo_id', $id)->first();

		return View::make('admin.clientes.edit', compact('cliente','servicios','user'));
	}

	/**
	 * Update the specified cliente in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = Cliente::findOrFail($id);
		$user = User::where('tipo_id', $cliente->id)->first();

		Cliente::$rules_update['email'] = 'required|email|unique:users,email,' . $user->id;

		$validator = Validator::make($data = Input::all(), Cliente::$rules_update);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		/*if(User::where('email', Input::get('email')))
		{
			return Redirect::back()->with('message_error', true);
		}*/

		$data_cliente = array(
			'empresa' => Input::get('empresa'),
			'nit' => Input::get('nit'),
			'cargo' => Input::get('cargo'),
			'nombres' => Input::get('nombres'),
			'apellidos' => Input::get('apellidos'),
			'telefono' => Input::get('telefono'),
			'celular' => Input::get('celular'),
			'direccion' => Input::get('direccion'),
		);

		$cliente->update($data_cliente);
		$cliente->servicios()->sync(Input::get('servicio_lista'));

		$data_user = array(
			'first_name' => Input::get('nombres'),
			'last_name' => Input::get('apellidos'),
			'email' => Input::get('email'),
		);

		if(Input::get('password') != "")
		{
			$data_user = array(
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('password')),
			);
		}

		$user = User::where('tipo_id', $cliente->id);
		$user->update($data_user);

		return Redirect::route('admin.clientes.show', $cliente->id)->with('message', true);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function activar($id,$user_id,$estado)
	{
		$cliente = Cliente::findOrFail($id);
		$servicios = $cliente->servicios()->get();
		// $user = User::where('tipo_id', $cliente->id)->first();
		$user = User::find($user_id);
		$email = $user->email;

		$cliente->facturacion = date("Y-m-d");
		$cliente->update();

		$pass = str_random(10);
		$user->estado_id = $estado;
		$user->password = Hash::make($pass);
		$user->update();

		$data_cliente = array(
			'empresa' => $cliente->empresa,
			'nit' => $cliente->nit,
			'cargo' => $cliente->cargo,
			'nombres' => $cliente->nombres,
			'apellidos' => $cliente->apellidos,
			'telefono' => $cliente->telefono,
			'celular' => $cliente->celular,
			'direccion' => $cliente->direccion,
			'email' => $user->email,
			'password' => $pass,
			'servicios' => $servicios,
		);

		// dd($email);

		Mail::send('emails.clientes.bienvenida',
			array(
				'empresa' => $cliente->empresa,
				'nit' => $cliente->nit,
				'cargo' => $cliente->cargo,
				'nombres' => $cliente->nombres,
				'apellidos' => $cliente->apellidos,
				'telefono' => $cliente->telefono,
				'celular' => $cliente->celular,
				'direccion' => $cliente->direccion,
				'facturacion' => $cliente->facturacion,
				'email' => $user->email,
				'password' => $pass,
				'servicios' => $servicios
			),
			function($message) use($user,$cliente){
	        	$message->to(
	        		$user->email,
	        		$cliente->responsable
	        	)
	        	->subject('Bienvenido a suprocesoaldia.com');
	    });

		return Redirect::back()->with('message_suspended', true);
	}

	/**
	 * Remove the specified cliente from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// $cliente = Cliente::findOrFail($id);
		// $cliente->servicios()->detach(Input::get('servicio_lista'));

		$user = User::where('tipo_id', $id)->pluck('id');
		User::destroy($user);

		Cliente::destroy($id);

		return Redirect::route('admin.clientes.index')->with('message_destroy',true);
	}

	/**
	 *
	 *
	 * @return Response
	 */
	public function emailDiario()
	{

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

	    function getApoderado($id){
	    	$proceso = Proceso::find($id);
    		return $proceso->apoderado;
	    }

	    function getTipoProceso($id){
	    	$proceso = Proceso::find($id);
	    	$procesotipo = ProcesoTipo::find($proceso->proceso_tipo_id);
    		return $procesotipo->tipo;
	    }

	    $clientes = Cliente::join('users', 'users.tipo_id', '=', 'clientes.id')
				->where('users.estado_id','2')
				->select( 'clientes.id as id',
						  'clientes.empresa as empresa',
						  'users.email as email'
					)
				->get();

		foreach ($clientes as $cliente) {

			$nombre_cliente = $cliente->empresa;
			$email = $cliente->email;

			$data = array();
			$a = date('Y');
			$m = date('m');
			$d = date('d');
			$generado = date('Y-m-d H:i:s');
			$fecha = date('Y-m-d');

			$procesos = DB::table('cliente_proceso')
					->join('instancias', 'instancias.proceso_id', '=', 'cliente_proceso.proceso_id')
					->where('cliente_proceso.cliente_id', $cliente->id)
					->select( 'instancias.id as instancia_id',
		             		  'instancias.proceso_id as proceso_id',
		             		  'instancias.radicado as radicado',
		             		  'instancias.municipio_id as municipio_id',
		             		  'instancias.despacho_id as despacho_id'
		             		 )
                	->orderBy('despacho_id','asc')
					->get();


			foreach ($procesos as $proceso) {

				$actuaciones = Actuacion::where('envio_estado','0')
						->where('instancia_id', $proceso->instancia_id)
						->whereYear('created_at', '=', date($a))
						->whereMonth('created_at', '=', date($m))
						->whereDay('created_at', '=', date($d))
						/*->whereYear('created_at', '=', date('2016'))
						->whereMonth('created_at', '=', date('04'))
						->whereDay('created_at', '=', date('11'))*/
						->select( 'id as actuacion_id',
								  'publicacion_id',
								  'etapa_id',
								  'actuacion_tipo_id',
								  'fecha_publicacion as actuacion_fecha_publicacion',
								  'fecha_auto as actuacion_fecha_auto',
								  'resumen as actuacion_resumen',
								  'fecha_audiencia'
								)
						->orderBy('id')
						->get();

				if($actuaciones->count()){

					foreach ($actuaciones as $actuacion)
				    {
				        array_push( $data,
				        	array(
				        		$proceso->proceso_id,
				        		$proceso->radicado,
				        		getDemandante($proceso->proceso_id),
				        		getDemandado($proceso->proceso_id),
				        		getApoderado($proceso->proceso_id),
				        		Municipio::where('id', $proceso->municipio_id)->pluck('nombre'),
				        		Despacho::where('id', $proceso->despacho_id)->pluck('nombre'),
				        		getTipoProceso($proceso->proceso_id),
				        		Publicacion::where('id', $actuacion->publicacion_id)->pluck('tipo'),
				        		$actuacion->actuacion_fecha_publicacion,
				        		Etapa::where('id', $actuacion->etapa_id)->pluck('tipo'),
				        		ActuacionTipo::where('id', $actuacion->actuacion_tipo_id)->pluck('tipo'),
				        		$actuacion->actuacion_resumen,
				        		$actuacion->actuacion_fecha_auto,
				        		array('actuacion_id',$actuacion->actuacion_id),
				        		array('instancia_id',$proceso->instancia_id),
				        	)
				        );
				    }
			    }

			}


	    		$fileName = $cliente->id.'-'.$fecha.'.pdf';
				$filePath = app_path().'/uploads/emails/';
				$file = $filePath.$fileName;

		        $pdf = PDF::loadView('admin.clientes.email', compact('nombre_cliente','generado','data'))
		        			->setOrientation('landscape')
		        			->save($filePath.$fileName);

		        Mail::send('emails.clientes.actuaciones',
					array(
						'empresa' => $cliente->empresa,
						'fecha' => $fecha,
					),
					function($message) use($email,$cliente,$file){
			        	$message->to(
			        		$email,
			        		$cliente->responsable
			        	)
			        	->bcc('info@suprocesoaldia.com')
			        	->subject('Actuaciones del día / '.$cliente->empresa);
			        	$message->attach($file);
			    });



		}

		$new_act_data = array('envio_estado'=>'1');
		Actuacion::where('envio_estado','0')->update($new_act_data);

		// return View::make('admin.actuaciones.create', compact('proceso','instancias'));
	}

}
