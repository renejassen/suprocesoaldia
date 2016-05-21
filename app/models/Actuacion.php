<?php

class Actuacion extends \Eloquent {
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actuaciones';

	// Add your validation rules here
	public static $rules = [
		'instancia_id' => 'required|not_in:0',
		'publicacion_id' => 'required|not_in:0',
		'etapa_id' => 'required|not_in:0',
		'actuacion_tipo_id' => 'required|not_in:0',
		'user_id' => 'required|not_in:0',
		'fecha_publicacion' => 'required',
		'fecha_auto' => 'required',
		'resumen' => 'required'
		//'pdf' => 'required'
	];

	public static $rules_update = [
		'instancia_id' => 'required|not_in:0',
		'publicacion_id' => 'required|not_in:0',
		'etapa_id' => 'required|not_in:0',
		'actuacion_tipo_id' => 'required|not_in:0',
		'user_id' => 'required|not_in:0',
		'fecha_publicacion' => 'required',
		'fecha_auto' => 'required',
		'resumen' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'instancia_id',
		'publicacion_id',
		'etapa_id',
		'actuacion_tipo_id',
		'user_id',
		'fecha_publicacion',
		'fecha_auto',
		'resumen',
		'fecha_audiencia',
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