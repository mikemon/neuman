<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroMovimientoLlantaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registroMovimientoLlantaTable', function($table) {
			$table->create();
			$table->bigIncrements('id');
			$table->bigInt('tipoMovimientoLlanta_id');
			$table->longText('observacion', 80);
			
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
