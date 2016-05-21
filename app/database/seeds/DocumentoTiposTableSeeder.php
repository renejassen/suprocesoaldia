<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DocumentoTiposTableSeeder extends Seeder {

	public function run()
	{
		DocumentoTipo::create([
			'tipo' => 'Cédula de Ciudadanía',
		]);

		DocumentoTipo::create([
			'tipo' => 'Cédula de Extranjería',
		]);

		DocumentoTipo::create([
			'tipo' => 'NIT',
		]);

		DocumentoTipo::create([
			'tipo' => 'Pasaporte',
		]);
	}

}