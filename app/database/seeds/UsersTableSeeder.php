<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = User::create(array(
                'estado_id' => 1,
                'username' => 'admin',
                'first_name' => 'Javier',
                'last_name' => 'Varón',
                'email' => 'admin@javiervaron.co',
                'password' => Hash::make('123'),   
        ));

		$role = Role::where('name', '=', 'admin')->get()->first();
                $user->attachRole( $role );
	}

}