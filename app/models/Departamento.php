<?php

class Departamento extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'nombre' => 'required|unique:departamentos'
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
	protected $table = 'departamentos';

    public function municipios()
    {
        return $this->hasMany('Municipio');
    }

}