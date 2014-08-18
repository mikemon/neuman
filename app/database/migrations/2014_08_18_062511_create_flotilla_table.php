<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlotillaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('flotilla', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> string('nombre', 90);
			$table -> bigInteger('cliente_id');
			$table -> bigInteger('usuarioInsert_id');
			$table -> bigInteger('usuarioEdit_id')->nullable();
			$table -> timestamps();

			$table -> foreign('cliente_id') -> references('id') -> on('clientes');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('flotilla');

	}

}
