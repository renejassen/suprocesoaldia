<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstanciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instancias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proceso_id');
			$table->integer('departamento_id');
			$table->integer('municipio_id');
			$table->integer('despacho_id');
			$table->string('radicado');
			$table->integer('user_id');
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
		Schema::drop('instancias');
	}

}
