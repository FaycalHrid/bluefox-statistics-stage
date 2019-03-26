<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AnacondasubdivisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anacondasubdivision', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('emailUser', 100)->nullable()->unique('emailUser_2');
			$table->integer('purchasedOldAnaconda')->nullable();
			$table->boolean('subdivised')->nullable()->default(0);
			$table->string('compteEMV', 50)->nullable();
			$table->string('site', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_anacondasubdivision');
	}

}
