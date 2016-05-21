<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('index');
	}

	public function getHome()
	{
		return View::make('home');
	}

	public function getQuienes()
	{
		return View::make('quienes');
	}

	public function getServicios()
	{
		return View::make('servicios');
	}

	public function getServicio1()
	{
		return View::make('servicio1');
	}

	public function getServicio2()
	{
		return View::make('servicio2');
	}

	public function getServicio3()
	{
		return View::make('servicio3');
	}

	public function getServicio4()
	{
		return View::make('servicio4');
	}

	public function getServicio5()
	{
		return View::make('servicio5');
	}

	public function getServicio6()
	{
		return View::make('servicio6');
	}

	public function getServicio7()
	{
		return View::make('servicio7');
	}

	public function getCobertura()
	{
		return View::make('cobertura');
	}

	public function getContactenos()
	{
		$mensaje = '';
		return View::make('contactenos', array('mensaje' => $mensaje));
	}

	public function postContactenos()
	{
		$mensaje = null;
		//if (isset($_POST['contacto'])) /* Campo oculto contacto */
		//{
			$rules = array
			(
				'name' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:80',
				'email' => 'required|email|between:3,80',
				'telephone' => 'required|min:3|max:10',
				// 'subject' => 'required|regex:/^[a-zA-Z\s0-9]+$/|min:3|max:80',
				'msg' => 'required|between:3,500',
			);

			$messages = array
			(
				'name.required' => 'El campo es requerido',
				'name.regex' => 'Solo letras y espacios',
				'name.min' => 'Mínimo de 3 caracteres',
				'name.max' => 'Máximo de 80 caracteres',
				'email.required' => 'El campo es requerido',
				'email.email' => 'El formato de email es incorrecto',
				'email.between' => 'Entre 30 y 80 caracteres',
				'telephone.required' => 'El campo es requerido',
				'telephone.min' => 'Mínimo de 3 números',
				'telephone.max' => 'Máximo de 10 números',
				// 'subject.required' => 'El campo es requerido',
				// 'subject.regex' => 'Solo letras y números',
				// 'subject.min' => 'Mínimo de 3 caracteres',
				// 'subject.max' => 'Máximo de 80 caracteres',
				'msg.required' => 'El campo es requerido',
				'msg.between' => 'Entre 3 y 500 caracteres',
			);

			$validator = Validator::make(Input::All(), $rules, $messages);

			if ($validator->fails())
			{
				return Redirect::back()->withInput()->withErrors($validator);
			}


			$data = array
			(
				'name'		=>	Input::get('name'),
				'email'		=>	Input::get('email'),
				'telephone'	=>	Input::get('telephone'),
				// 'subject'	=>	Input::get('subject'),
				'msg'		=>	Input::get('msg')
			);


			$fromEmail	=	'info@suprocesoaldia.com';
			$fromName	=	'Info';

			Mail::send('emails.contactenos.contacto', $data, function($message) use ($fromName, $fromEmail)
			{
				$message->to($fromEmail, $fromName)->cc('direccioncomercial@suprocesoaldia.com');
				$message->from($fromEmail, $fromName);
				$message->subject('Nuevo mensaje de contacto');
			});

			$mensaje = '<div class="alert success"><i class="fa fa-check-circle-o"></i>¡Mensaje enviado con éxito!</div>';

		//}
		return View::make('contactenos', array('mensaje' => $mensaje));
	}

}
