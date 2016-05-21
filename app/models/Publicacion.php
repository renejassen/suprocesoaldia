<?php

class Publicacion extends \Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'publicaciones';

    public static $rules = [
		'tipo' => 'required'
	];

	protected $fillable = [
		'tipo'
	];
}