<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActorTiposTableSeeder extends Seeder {

	public function run()
	{
		ActorTipo::create([
			'tipo' => 'DEMANDANTE',
		]);

		ActorTipo::create([
			'tipo' => 'DEMANDADO',
		]);
	}

}