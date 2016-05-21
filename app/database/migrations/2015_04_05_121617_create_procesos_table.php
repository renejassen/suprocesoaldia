<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcesosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('procesos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('proceso_tipo_id')->unsigned();
			$table->string('cedula');
			$table->string('obligacion');
			$table->string('apoderado');
			$table->string('num_interno');
			$table->timestamps();
		});

		Schema::create('cliente_proceso', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('proceso_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('proceso_id')->references('id')->on('procesos');
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
		Schema::table('cliente_proceso', function (Blueprint $table) {
            $table->dropForeign('cliente_proceso_cliente_id_foreign');
            $table->dropForeign('cliente_proceso_proceso_id_foreign');
        });

		Schema::drop('cliente_proceso');
		Schema::drop('procesos');
	}

}
