<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCarroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tipoCarro', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> string('descripcion',90);
			$table -> string('layoutChasis',90);
			$table -> bigInteger('usuarioInsert_id');
			$table -> bigInteger('usuarioEdit_id')->nullable();
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
				Schema::drop('tipoCarro');
		
	}

}
