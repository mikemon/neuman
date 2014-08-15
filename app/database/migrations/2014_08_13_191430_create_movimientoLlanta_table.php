<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoLlantaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('movimientoLlanta', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> bigInteger('llanta_id');
			$table -> bigInteger('tipoMovimiento_id');
			$table -> timestamps();
			$table->foreign('llanta_id')->references('id')->on('llantas');
			$table->foreign('tipoMovimiento_id')->references('id')->on('tipoMovimiento');
			//$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
