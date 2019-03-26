<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2MinianacondasubdivisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('minianacondasubdivision', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('emailUser', 100)->nullable()->unique('emailUser_UNIQUE');
			$table->string('firstName', 45)->nullable();
			$table->string('lastName', 45)->nullable();
			$table->date('birthDate')->nullable();
			$table->boolean('title')->nullable();
			$table->string('site', 5)->nullable();
			$table->boolean('tag')->nullable();
			$table->smallInteger('lastActivityYear')->nullable();
			$table->boolean('subdivised')->nullable();
			$table->string('nvbStatus', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_minianacondasubdivision');
	}

}
