<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTipoMovimientoLlantaTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('tipoMovimientoLlanta', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> string('descripcion', 80);
			$table -> boolean('datosRendimiento');
			$table -> timestamps();
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('tipoMovimientoLlanta');	
	}
}