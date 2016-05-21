<?php

class Cartelera extends \Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carteleras';

	// Add your validation rules here
	public static $rules = [
		'departamento_id' => 'required|not_in:0',
		'municipio_id' => 'required|not_in:0',
		'despacho_id' => 'required|not_in:0',
		'fecha_publicacion' => 'required',
		// 'pdf' => 'required'
	];

	public static $rules_search = [
		'fecha_publicacion' => 'required',
		// 'rama_id' => 'required|not_in:0',
	];

	public static $rules_report = [
		'fecha_publicacion' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'fecha_publicacion',
		'departamento_id',
		'municipio_id',
		'rama_id',
		'despacho_id',
		'user_id',
		'estado',
		'pdf',
	];

}