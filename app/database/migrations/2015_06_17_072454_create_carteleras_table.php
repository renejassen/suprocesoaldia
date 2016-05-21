<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartelerasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carteleras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('departamento_id');
			$table->integer('municipio_id');
			$table->integer('despacho_id');
			$table->integer('rama_id');
			$table->integer('user_id');
			$table->integer('estado');
			$table->date('fecha_publicacion');
			$table->string('pdf');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carteleras');
	}

}
