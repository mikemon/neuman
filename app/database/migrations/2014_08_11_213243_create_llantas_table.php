<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLlantasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('llantas', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> bigInteger('matricula');
			$table -> string('descripcion',90);
			
			$table -> bigInteger('marcaLlanta_id');
			$table -> bigInteger('medidaLlanta_id');
			$table -> string('status',70);
			$table -> bigInteger('usuarioInsert_id');
			$table -> bigInteger('usuarioEdit_id');
			$table -> timestamps();
			
			$table->foreign('marcaLlanta_id')->references('id')->on('marcaLlanta');
			$table->foreign('medidaLlanta_id')->references('id')->on('medidaLlanta');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
				Schema::drop('llantas');
		
	}

}
