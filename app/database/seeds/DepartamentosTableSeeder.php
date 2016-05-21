<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DepartamentosTableSeeder extends Seeder {

	public function run()
	{
		Departamento::create(["cod_dane" => "05", "nombre" => "ANTIOQUIA"]);
		Departamento::create(["cod_dane" => "08", "nombre" => "ATLÁNTICO"]);
		Departamento::create(["cod_dane" => "11", "nombre" => "BOGOTÁ, D.C."]);
		Departamento::create(["cod_dane" => "13", "nombre" => "BOLÍVAR"]);
		Departamento::create(["cod_dane" => "15", "nombre" => "BOYACÁ"]);
		Departamento::create(["cod_dane" => "17", "nombre" => "CALDAS"]);
		Departamento::create(["cod_dane" => "18", "nombre" => "CAQUETÁ"]);
		Departamento::create(["cod_dane" => "19", "nombre" => "CAUCA"]);
		Departamento::create(["cod_dane" => "20", "nombre" => "CESAR"]);
		Departamento::create(["cod_dane" => "23", "nombre" => "CÓRDOBA"]);
		Departamento::create(["cod_dane" => "25", "nombre" => "CUNDINAMARCA"]);
		Departamento::create(["cod_dane" => "27", "nombre" => "CHOCÓ"]);
		Departamento::create(["cod_dane" => "41", "nombre" => "HUILA"]);
		Departamento::create(["cod_dane" => "44", "nombre" => "LA GUAJIRA"]);
		Departamento::create(["cod_dane" => "47", "nombre" => "MAGDALENA"]);
		Departamento::create(["cod_dane" => "50", "nombre" => "META"]);
		Departamento::create(["cod_dane" => "52", "nombre" => "NARIÑO"]);
		Departamento::create(["cod_dane" => "54", "nombre" => "NORTE DE SANTANDER"]);
		Departamento::create(["cod_dane" => "63", "nombre" => "QUINDIO"]);
		Departamento::create(["cod_dane" => "66", "nombre" => "RISARALDA"]);
		Departamento::create(["cod_dane" => "68", "nombre" => "SANTANDER"]);
		Departamento::create(["cod_dane" => "70", "nombre" => "SUCRE"]);
		Departamento::create(["cod_dane" => "73", "nombre" => "TOLIMA"]);
		Departamento::create(["cod_dane" => "76", "nombre" => "VALLE DEL CAUCA"]);
		Departamento::create(["cod_dane" => "81", "nombre" => "ARAUCA"]);
		Departamento::create(["cod_dane" => "85", "nombre" => "CASANARE"]);
		Departamento::create(["cod_dane" => "86", "nombre" => "PUTUMAYO"]);
		Departamento::create(["cod_dane" => "88", "nombre" => "ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA"]);
		Departamento::create(["cod_dane" => "91", "nombre" => "AMAZONAS"]);
		Departamento::create(["cod_dane" => "94", "nombre" => "GUAINÍA"]);
		Departamento::create(["cod_dane" => "95", "nombre" => "GUAVIARE"]);
		Departamento::create(["cod_dane" => "97", "nombre" => "VAUPÉS"]);
		Departamento::create(["cod_dane" => "99", "nombre" => "VICHADA"]);
	}

}