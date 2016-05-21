<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServiciosTableSeeder extends Seeder {

	public function run()
	{
		Servicio::create([
			'servicio' => 'Vigilancia y Control',
		]);

		Servicio::create([
			'servicio' => 'Cartelera Virtual',
		]);

		Servicio::create([
			'servicio' => 'Ubicación, levantamiento y desarchive',
		]);

		Servicio::create([
			'servicio' => 'Fiscalización',
		]);

		Servicio::create([
			'servicio' => 'Acompañamiento',
		]);

		Servicio::create([
			'servicio' => 'Radicación',
		]);
	}

}