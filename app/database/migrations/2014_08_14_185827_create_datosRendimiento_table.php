<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosRendimientoTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		/*
		 litros
		 odometro
		 rendimiento
		 kilometraje inicial
		 kilometraje final
		 */
		Schema::table('datoRendimiento', function($table) {
			$table->create();
			$table->bigIncrements('id');
			$table->bigInteger('kmInicial');
			$table->bigInteger('kmFinal');
			$table->double('litros', 15, 8);
			$table->double('odometro', 15, 8);
			$table->longText('observacion', 80);			
			$table->bigInteger('usuarioInsert_id');
			$table->bigInteger('usuarioEdit_id');
			$table -> boolean('activo');
			$table -> timestamps();
			
			//$table->primary('id');
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('datoRendimiento');

	}
}
