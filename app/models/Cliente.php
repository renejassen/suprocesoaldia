<?php

class Cliente extends \Eloquent {

	protected $table = 'clientes';

	// Add your validation rules here
	public static $rules = [
		'empresa' => 'required',
		'nit' => 'required',
		'cargo' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'email' => 'required|email|unique:users',
		// 'password' => 'required',
	];

	public static $rules_update = [
		'empresa' => 'required',
		'nit' => 'required',
		'cargo' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		// 'email' => 'required|unique:users,email,tipo_id:id',
	];

	/*public static function rules_update($id)
    {
        return array(
        	'empresa' => 'required',
			'nit' => 'required',
			'responsable' => 'required',
			'telefono' => 'required',
			'direccion' => 'required',
			'email' => 'required|email|unique:users' . $id,
        );
    }*/

	// Don't forget to fill this array
	protected $fillable = [
		'empresa',
		'nit',
		'cargo',
		'nombres',
		'apellidos',
		'telefono',
		'celular',
		'direccion',
	];

	/*public function roles()
    {
        return $this->belongsToMany('Role');
    }*/

    /**
	 * Obtener los servicios asociados con el cliente determinado.
	 *
	 * @return Response
	 */
    public function servicios()
    {
    	return $this->belongsToMany('Servicio')->withTimestamps();
    }

    /**
	 * .
	 *
	 * @return Response
	 */
    public function procesos()
    {
        return $this->belongsToMany('Proceso')->withTimestamps();
    }

    /**
	 * Obtiene una lista de servicios asociados con el cliente.
	 *
	 * @return Array
	 */
    public function getServicioListaAttribute()
    {
    	return $this->servicios->lists('id');
    }

    /**
	 * Obtiene una lista de servicios asociados con el cliente.
	 *
	 * @return Array
	 */
    public function getProcesoListaAttribute()
    {
    	return $this->procesos->lists('id');
    }

}