<?php

class ProcesoTipo extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'tipo' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'tipo',
	];

	/**
	 * .
	 *
	 * @return Response
	 */
    public function procesos()
    {
        return $this->belongsTo('Proceso');
    }

}