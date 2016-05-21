<?php

class DocumentoTiposController extends \BaseController {

	/**
	 * Display a listing of documentotipos
	 *
	 * @return Response
	 */
	public function index()
	{
		$documentotipos = Documentotipo::all();

		return View::make('documentotipos.index', compact('documentotipos'));
	}

	/**
	 * Show the form for creating a new documentotipo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('documentotipos.create');
	}

	/**
	 * Store a newly created documentotipo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Documentotipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Documentotipo::create($data);

		return Redirect::route('documentotipos.index');
	}

	/**
	 * Display the specified documentotipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$documentotipo = Documentotipo::findOrFail($id);

		return View::make('documentotipos.show', compact('documentotipo'));
	}

	/**
	 * Show the form for editing the specified documentotipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$documentotipo = Documentotipo::find($id);

		return View::make('documentotipos.edit', compact('documentotipo'));
	}

	/**
	 * Update the specified documentotipo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$documentotipo = Documentotipo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Documentotipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$documentotipo->update($data);

		return Redirect::route('documentotipos.index');
	}

	/**
	 * Remove the specified documentotipo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Documentotipo::destroy($id);

		return Redirect::route('documentotipos.index');
	}

}
