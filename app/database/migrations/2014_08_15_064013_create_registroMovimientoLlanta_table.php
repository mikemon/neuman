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
		Schema::table('registroMovimientoLlanta', function($table) {			
			$table -> create();
			$table -> bigIncrements('id');
			$table -> bigInteger('llanta_id');
			$table -> bigInteger('tipoMovimientoLlanta_id');
			$table->longText('observacion', 80);
			$table->bigInteger('usuarioInsert_id');
			$table->bigInteger('usuarioEdit_id');
			$table -> boolean('activo');
			$table -> timestamps();
			$table->foreign('llanta_id')->references('id')->on('llantas');
			$table->foreign('tipoMovimientoLlanta_id')->references('id')->on('tipoMovimientoLlanta');
			
			
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registroMovimientoLlanta');

	}
}
