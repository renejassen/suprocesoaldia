<?php

class Instancia extends \Eloquent {

	protected $table = 'instancias';

	// Add your validation rules here
	public static $rules = [
		 // 'radicado' => 'required|unique:instancias',
		 'departamento_id' => 'required|not_in:0',
		 'municipio_id' => 'required|not_in:0',
		 'despacho_id' => 'required|not_in:0',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'proceso_id',
		'radicado',
		'departamento_id',
		'municipio_id',
		'despacho_id',
		'user_id',
	];

	/**
	 * .
	 *
	 * @return Response
	 */
    public function proceso()
    {
        return $this->belongsTo('Proceso');
    }

}