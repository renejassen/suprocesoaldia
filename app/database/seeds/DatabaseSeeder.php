<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ServiciosTableSeeder');
		$this->call('ProcesoTiposTableSeeder');
		$this->call('ActorTiposTableSeeder');
		$this->call('DocumentoTiposTableSeeder');
		$this->call('DepartamentosTableSeeder');
		$this->call('MunicipiosTableSeeder');
		$this->call('RamasTableSeeder');
		$this->call('DespachosTableSeeder');
		$this->call('PublicacionesTableSeeder');
		$this->call('EtapasTableSeeder');
		$this->call('ActuacionTiposTableSeeder');
		$this->call('UsersTableSeeder');
	}

}
