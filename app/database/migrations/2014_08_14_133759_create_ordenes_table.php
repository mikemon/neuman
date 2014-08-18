<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		Schema::table('ordenes', function($table) {
			$table -> create();
			$table -> bigIncrements('id');
			$table -> bigInteger('observacion');

		});
		 */ 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ordenes');

	}

}
