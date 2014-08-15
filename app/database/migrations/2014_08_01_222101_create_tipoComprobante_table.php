<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoComprobanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		Schema::table('tipoComprobante', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> string('descripcion',70);
			$table -> timestamps();
			//$table->primary('id');
		});
		 * */
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
