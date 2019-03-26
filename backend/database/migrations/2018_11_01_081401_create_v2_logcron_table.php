<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2LogcronTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logcron', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label', 100);
			$table->string('description')->nullable();
			$table->boolean('vague')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_logcron');
	}

}
