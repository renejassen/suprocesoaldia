<?php

class AdminRamasController extends \BaseController {

	/**
	 * Display a listing of ramas
	 *
	 * @return Response
	 */
	public function index()
	{
		$ramas = Rama::all();

		return View::make('ramas.index', compact('ramas'));
	}

	/**
	 * Show the form for creating a new rama
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ramas.create');
	}

	/**
	 * Store a newly created rama in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Rama::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Rama::create($data);

		return Redirect::route('ramas.index');
	}

	/**
	 * Display the specified rama.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rama = Rama::findOrFail($id);

		return View::make('ramas.show', compact('rama'));
	}

	/**
	 * Show the form for editing the specified rama.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rama = Rama::find($id);

		return View::make('ramas.edit', compact('rama'));
	}

	/**
	 * Update the specified rama in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rama = Rama::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Rama::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$rama->update($data);

		return Redirect::route('ramas.index');
	}

	/**
	 * Remove the specified rama from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Rama::destroy($id);

		return Redirect::route('ramas.index');
	}

}
