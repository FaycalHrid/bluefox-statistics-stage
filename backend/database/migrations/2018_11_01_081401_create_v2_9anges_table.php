<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV29angesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('9anges', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idProduct');
			$table->string('name', 20);
			$table->boolean('number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_9anges');
	}

}
