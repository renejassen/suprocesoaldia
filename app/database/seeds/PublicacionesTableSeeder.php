<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PublicacionesTableSeeder extends Seeder {

	public function run()
	{
		Publicacion::create([
			'tipo' => 'AUTO DE CUMPLASE',
		]);
		Publicacion::create([
			'tipo' => 'AVISO DE REMATE',
		]);
		Publicacion::create([
		    'tipo' => 'AVISO DE SALA',
		]);
		Publicacion::create([
		    'tipo' => 'EDICTO DE SENTENCIA',
		]);
		Publicacion::create([
		    'tipo' => 'EDICTO EMPLAZATORIO',
		]);
		Publicacion::create([
		    'tipo' => 'NOTIFICACION POR ESTADO',
		]);
		Publicacion::create([
		    'tipo' => 'FIJACION EN LISTA',
		]);
		Publicacion::create([
		    'tipo' => 'INFORME SECRETARIAL',
		]);
		Publicacion::create([
		    'tipo' => 'NOTIFICACION POR ESTRADO',
		]);
		Publicacion::create([
		    'tipo' => 'TRASLADOS',
		]);
	}

}