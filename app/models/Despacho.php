<?php

class Despacho extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'nombre' => 'required',
		'rama_id' => 'required|not_in:0',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'nombre',
		'rama_id',
		'municipio_id',
	];

	/**
	 * .
	 *
	 * @return Response
	 */
    public function municipio()
    {
        return $this->belongsTo('Municipio');
    }

    /**
	 * .
	 *
	 * @return Response
	 */
    public function ramas()
    {
        return $this->hasMany('Rama');
    }

}