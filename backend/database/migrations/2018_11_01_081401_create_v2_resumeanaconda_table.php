<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ResumeanacondaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resumeanaconda', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idUser')->unique('idUser');
			$table->boolean('tag')->nullable();
			$table->boolean('subdivised')->nullable();
			$table->string('site', 5)->nullable();
			$table->date('resumeDate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_resumeanaconda');
	}

}
