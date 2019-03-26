<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SubjectdeliverreshootTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjectdeliverreshoot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idProduct')->index('idProduct');
			$table->text('subject', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_subjectdeliverreshoot');
	}

}
