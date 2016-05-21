<?php

class Etapa extends \Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'etapas';

    public static $rules = [
		'tipo' => 'required'
	];

	protected $fillable = [
		'tipo'
	];

}