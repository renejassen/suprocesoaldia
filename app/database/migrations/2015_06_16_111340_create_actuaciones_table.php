<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActuacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actuaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proceso_id');
			$table->integer('instancia_id');
			$table->integer('publicacion_id');
			$table->integer('etapa_id');
			$table->integer('actuacion_tipo_id');
			$table->integer('user_id');
			$table->date('fecha_publicacion');
			$table->date('fecha_auto');
			$table->string('resumen');
			$table->string('pdf');
			$table->dateTime('fecha_audiencia');
			$table->integer('envio_estado');
			// $table->dateTime('envio_fecha');
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
		Schema::drop('actuaciones');
	}

}
