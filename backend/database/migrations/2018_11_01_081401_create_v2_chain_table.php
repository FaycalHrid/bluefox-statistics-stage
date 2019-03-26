<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ChainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chain', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label', 100);
			$table->string('description', 200);
			$table->string('type', 50);
			$table->boolean('hasProduct')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_chain');
	}

}
