<?php

class Actor extends \Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actores';

	// Add your validation rules here
	public static $rules = [
		 'actor_tipo_id' => 'required|not_in:0',
		 'nombre' => 'required',
		 // 'documento_tipo_id' => 'required|not_in:0',
		 // 'documento' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'actor_tipo_id',
		'nombre',
		'documento_tipo_id',
		'documento',
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