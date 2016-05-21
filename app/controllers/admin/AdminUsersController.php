<?php

class AdminUsersController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('ver_usuarios', array('only' => 'index') );
        $this->beforeFilter('crear_usuarios', array('only' => 'create') );
        $this->beforeFilter('crear_usuarios', array('only' => 'store') );
        $this->beforeFilter('editar_usuarios', array('only' => 'edit') );
        $this->beforeFilter('editar_usuarios', array('only' => 'update') );
        $this->beforeFilter('eliminar_usuarios', array('only' => 'destroy') );
    }

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		// $users = User::all();

		// return View::make('admin.users.index', compact('users'));

		$users = User::all();
        foreach($users as $user){
            $user['rol'] = $user->roles()->first();
        }
        return View::make('admin.users.index', array('users' => $users));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		// $group_list = [''=>'Please select] + Group::where('id', '!=', $id)->lists('name', 'id');
		$roles = [''=>'Seleccionar'] + Role::where('name','gerente')
					->orWhere('name','ejecutivo')
					->orWhere('name','asistente')
					->orWhere('name','admin')
					->lists('name','id');

		return View::make('admin.users.create',compact('roles'));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules_create);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		try {
			$data['password'] = Hash::make($data['password']);
			$user = User::create($data);

			//$user->roles()->attach($data['role_id']);
			$user->attachRole(Role::find($data['role_id']));
			return Redirect::route('admin.users.index');
			//$user->attachRole(Role::find($data['role_id']));
		} catch (\Exception $e) {
			return Redirect::route('admin.users.index')->with('flash_message', '¡Qué vergüenza! Ha ocurrido un error.');
			//dd($e); //Por si ocurre un error. TODO Implementar un sistema de log de errores.
		}
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('admin.users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::lists('name', 'id');
		$rol_seleccionado = $user->roles->lists('id');
		//dd($user['password']);
		return View::make('admin.users.edit', compact('user', 'roles', 'rol_seleccionado'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);
		$input = Input::all();

		if(empty($input['password'])) {
			$input['password'] = $user['password'];
		} else {
			$input['password'] = Hash::make($input['password']);
		}

		$validator = Validator::make($input, User::$rules_update);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

			$user->update($input);
			$user->attachRole($input['role_id']);
			return Redirect::back()->with('message', true);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateEstado($id,$estado)
	{
		// $user = User::where('tipo_id',$id);
		$user = User::findOrFail($id);

		$user->estado_id = $estado;
		$user->update();

		return Redirect::back()->with('message_suspended', true);
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('admin.users.index');
	}

}
