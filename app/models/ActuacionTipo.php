<?php

class ActuacionTipo extends \Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actuacion_tipos';

	// Add your validation rules here
	public static $rules = [
		'tipo' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'tipo',
	];

}