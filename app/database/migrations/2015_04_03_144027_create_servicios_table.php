<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('servicio');
			$table->timestamps();
		});

		Schema::create('cliente_servicio', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios');
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
		Schema::table('cliente_servicio', function (Blueprint $table) {
            $table->dropForeign('cliente_servicio_cliente_id_foreign');
            $table->dropForeign('cliente_servicio_servicio_id_foreign');
        });

		Schema::drop('cliente_servicio');
		Schema::drop('servicios');

	}

}
