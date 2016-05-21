<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use HasRole;

	public static $rules = [
		'email' => 'required|email',
		'password' => 'required',
	];

	public static $rules_create = [
		'first_name' => 'required',
		'last_name' => 'required',
		'role_id' => 'required',
		'email' => 'required|email',
		'password' => 'required',
	];

	public static $rules_update = [
		'email' => 'required|email',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = [
		'estado_id',
		'tipo_id',
		'username',
		'first_name',
		'last_name',
		'email',
		'password',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token', 'estado_id','tipo_id');

}
