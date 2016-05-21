<?php

class AdminAuthController extends \BaseController {

	public function getLogin()
	{
		return View::make('admin.auth.login');
	}

	public function postLogin()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($credentials)){
			//$estado_id = Auth::user()->estado_id;
			if(Auth::user()->estado_id == '3'){ //El estado 3 es inactivo
				Auth::logout();
				return Redirect::back()->with('message_suspended', true);
			}
			return Redirect::intended('admin/inicio');
		}

		return Redirect::back()->with('message_fail', true);

	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('admin.login');
	}

}
