<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proceso_id');
			$table->integer('actor_tipo_id');
			$table->integer('documento_tipo_id');
			$table->string('nombre');
			$table->string('documento');
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
		Schema::drop('actores');
	}

}
