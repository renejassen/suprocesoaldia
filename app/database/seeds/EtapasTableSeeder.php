<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EtapasTableSeeder extends Seeder {

	public function run()
	{
		Etapa::create([
		   'tipo' => 'ADJUDICACION Y TITULOS',
		]);
		Etapa::create([
		   'tipo' => 'ADMISION DE DEMANDA',
		]);
		Etapa::create([
		   'tipo' => 'ALEGATOS',
		]);
		Etapa::create([
		   'tipo' => 'AUDIENCIA DE INSTRUCCIÓN Y JUZGAMIENTO',
		]);
		Etapa::create([
		   'tipo' => 'AUDIENCIA INCIAL',
		]);
		Etapa::create([
		   'tipo' => 'CONCILIACION',
		]);
		Etapa::create([
		   'tipo' => 'CONTESTACION',
		]);
		Etapa::create([
		   'tipo' => 'EMBARGO',
		]);
		Etapa::create([
		   'tipo' => 'FALLO INCIDENTE DE DESACATO',
		]);
		Etapa::create([
		   'tipo' => 'IMPUGNACION FALLO TUTELA',
		]);
		Etapa::create([
		   'tipo' => 'INCIDENTE DE DESACATO',
		]);
		Etapa::create([
		   'tipo' => 'LIQUIDACIONES',
		]);
		Etapa::create([
		   'tipo' => 'MANDAMIENTO',
		]);
		Etapa::create([
		   'tipo' => 'NOTIFICACION',
		]);
		Etapa::create([
		   'tipo' => 'PRUEBAS',
		]);
		Etapa::create([
		   'tipo' => 'REMATE',
		]);
		Etapa::create([
		   'tipo' => 'SECUESTRO',
		]);
		Etapa::create([
		   'tipo' => 'SENTENCIA',
		]);
		Etapa::create([
		   'tipo' => 'TERMINACION DE PROCESO',
		]);
		Etapa::create([
		   'tipo' => 'ATENCION PERSONALIZADA',
		]);
	}

}