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
			$table -> string('descripcion', 80)->nullable();
			$table -> boolean('datosRendimiento');
			$table->bigInteger('usuarioInsert_id');
			$table->bigInteger('usuarioEdit_id')->nullable();
			$table -> boolean('activo');
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