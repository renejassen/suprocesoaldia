<?php

class ActorTiposController extends \BaseController {

	/**
	 * Display a listing of actortipos
	 *
	 * @return Response
	 */
	public function index()
	{
		$actortipos = Actortipo::all();

		return View::make('actortipos.index', compact('actortipos'));
	}

	/**
	 * Show the form for creating a new actortipo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('actortipos.create');
	}

	/**
	 * Store a newly created actortipo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Actortipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Actortipo::create($data);

		return Redirect::route('actortipos.index');
	}

	/**
	 * Display the specified actortipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$actortipo = Actortipo::findOrFail($id);

		return View::make('actortipos.show', compact('actortipo'));
	}

	/**
	 * Show the form for editing the specified actortipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$actortipo = Actortipo::find($id);

		return View::make('actortipos.edit', compact('actortipo'));
	}

	/**
	 * Update the specified actortipo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$actortipo = Actortipo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Actortipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$actortipo->update($data);

		return Redirect::route('actortipos.index');
	}

	/**
	 * Remove the specified actortipo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Actortipo::destroy($id);

		return Redirect::route('actortipos.index');
	}

}
