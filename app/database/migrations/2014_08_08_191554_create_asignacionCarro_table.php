<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionCarroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		Schema::table('asignacionCarro', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> bigInteger('carro_id');
			$table -> bigInteger('operador_id');
			$table -> bigInteger('usuario_id');
			
			$table -> timestamps();
			//$table->primary('id');
			$table->foreign('carro_id')->references('id')->on('carros');
			$table->foreign('operador_id')->references('id')->on('operadores');
			
			//$table->primary('id');
		});
		 **/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('asignacionCarro');
	}

}
