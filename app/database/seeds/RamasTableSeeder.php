<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RamasTableSeeder extends Seeder {

	public function run()
	{
		Rama::create([
			"nombre" => "ADMINISTRATIVO",
		]);

		Rama::create([
			"nombre" => "CIVIL",
		]);

		Rama::create([
			"nombre" => "CONSTITUCIONAL",
		]);

		Rama::create([
			"nombre" => "FAMILIA",
		]);

		Rama::create([
			"nombre" => "LABORAL",
		]);

		Rama::create([
			"nombre" => "PENAL",
		]);
	}

}