<?php

class Municipio extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'nombre' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'nombre'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'municipios';

	/**
	 * .
	 *
	 * @return Response
	 */
    public function departamento()
    {
        return $this->belongsTo('Departamento');
    }

    /**
	 * .
	 *
	 * @return Response
	 */
    public function despachos()
    {
        return $this->hasMany('Despacho');
    }

}