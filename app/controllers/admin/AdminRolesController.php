<?php
class AdminRolesController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('ver_roles', array('only' => 'index') );
        $this->beforeFilter('crear_roles', array('only' => 'create') );
        $this->beforeFilter('crear_roles', array('only' => 'store') );
        $this->beforeFilter('editar_roles', array('only' => 'edit') );
        $this->beforeFilter('editar_roles', array('only' => 'update') );
        $this->beforeFilter('eliminar_roles', array('only' => 'destroy') );
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::All();
		$permisos = Permission::All();

		Return View::make('admin.roles.index', compact('roles','permisos'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.roles.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
				$role = new Role();
        $role->name = Input::get('name');
        $role->save();

        return Redirect::route('admin.roles.index');
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
	public function edit($id)
	{
		$role = Role::find($id);

		$permissions = Permission::lists('display_name','id');

		return View::make('admin.roles.edit', compact('role','permissions'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// $role = Role::findOrFail($id);

		// $validator = Validator::make($data = Input::all(), Role::$rules_update);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		// $data_role = array(
		// 	'name' => Input::get('name'),
		// );

		// $role->update($data_role);
		// $role->permissions()->sync(Input::get('permission_lista'));

		$role = Role::find($id);
        $role->name = Input::get('name');
        $role->save();
        // return Redirect::route('roles.index');
        return Redirect::back()->with('message', true);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Role::destroy($id);
        return Redirect::route('admin.roles.index');
	}
}
