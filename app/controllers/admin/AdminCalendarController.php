<?php
/**
 *
 */
class AdminCalendarController extends \BaseController
{

  public function index()
  {
    $id = Auth::id();
    $clienteId = User::find($id)->estado_id;
    $audiencias[] = DB::table('events')->select('start', 'title')->where('id', $clienteId)->get();

    return View::make('admin.calendar.index', compact('audiencias'));
  }
}
