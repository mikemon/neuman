<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenDetalleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ordenDetalle', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> bigInteger('orden_id');
			$table->foreign('orden_id')->references('id')->on('ordenes');
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
