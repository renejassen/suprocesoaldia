<?php

class Proceso extends \Eloquent {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'procesos';

	// Add your validation rules here
	public static $rules = [
		 // 'radicado' => 'required|unique:instancias',
		 'proceso_tipo_id' => 'required|not_in:0',
		 'departamento_id' => 'required|not_in:0',
		 'municipio_id' => 'required|not_in:0',
		 'despacho_id' => 'required|not_in:0',
	];

	public static $rules_update = [
		 'proceso_tipo_id' => 'required|not_in:0',
		 'cliente_lista' => 'required',
	];

	public static $rules_update_adicional = [
		'',
	];

	public static $rules_list = [
		 'departamento_id' => 'required|not_in:0',
		 'municipio_id' => 'required|not_in:0',
		 // 'rama_id' => 'required|not_in:0',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'radicado',
		'proceso_tipo_id',
		'departamento_id',
		'municipio_id',
		'despacho_id',
		'cedula',
		'obligacion',
		'apoderado',
		'num_interno',
	];

	/**
	 * .
	 *
	 * @return Response
	 */
    public function procesoTipos()
    {
        return $this->hasMany('ProcesoTipo');
    }

    /**
	 * .
	 *
	 * @return Response
	 */
    public function instancias()
    {
        return $this->hasMany('Instancia');
    }

    /**
	 * .
	 *
	 * @return Response
	 */
    public function actores()
    {
        return $this->hasMany('Actor');
    }

    /**
	 * .
	 *
	 * @return Response
	 */
    public function actuaciones()
    {
        return $this->hasMany('Actuacion')->orderBy('fecha_publicacion', 'DESC');
    }

    /**
	 * Obtener los servicios asociados con el cliente determinado.
	 *
	 * @return Response
	 */
    public function clientes()
    {
    	return $this->belongsToMany('Cliente')->withTimestamps();
    }

    /**
	 * Obtiene una lista de servicios asociados con el cliente.
	 *
	 * @return Array
	 */
    public function getClienteListaAttribute()
    {
    	return $this->clientes->lists('id');
    }

}