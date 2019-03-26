<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ReleveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('releve', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('emailUser', 100)->nullable()->unique('emailUser');
			$table->string('firstname', 100)->nullable();
			$table->string('lastname', 100)->nullable();
			$table->boolean('title')->nullable();
			$table->boolean('gp')->nullable();
			$table->boolean('status')->nullable()->default(0);
			$table->boolean('origin')->default(1);
			$table->date('subdivisionDate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_releve');
	}

}
