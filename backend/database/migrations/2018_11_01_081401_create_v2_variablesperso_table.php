<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2VariablespersoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('variablesperso', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 100);
			$table->string('valueM', 100);
			$table->string('valueF', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_variablesperso');
	}

}
