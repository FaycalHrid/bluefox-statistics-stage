<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2EtltaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etltask', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->timestamp('taskStartTS')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('taskEndTS')->default('2018-01-01 00:00:00');
			$table->boolean('taskCompleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_etltask');
	}

}
