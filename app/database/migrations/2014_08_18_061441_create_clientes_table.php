<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clientes', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> string('nombre',90);
			$table -> string('razonSocial',90)->nullable();
			$table -> string('rcf',90)->nullable();			
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
				Schema::drop('clientes');
		
	}

}
