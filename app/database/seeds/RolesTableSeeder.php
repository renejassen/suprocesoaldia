<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		Role::create([
			'name' => 'admin',
		]);

		Role::create([
			'name' => 'gerente',
		]);

		Role::create([
			'name' => 'ejecutivo',
		]);

		Role::create([
			'name' => 'asistente',
		]);

		Role::create([
			'name' => 'cliente',
		]);
	}

}