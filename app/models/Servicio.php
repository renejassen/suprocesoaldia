<?php

class Servicio extends \Eloquent {

	protected $table = 'servicios';

	// Add your validation rules here
	public static $rules = [
		'servicio' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'servicio',
	];

	/**
	 * .
	 *
	 * @return Response
	 */
    public function clientes()
    {
        return $this->belongsToMany('Cliente');
    }
}