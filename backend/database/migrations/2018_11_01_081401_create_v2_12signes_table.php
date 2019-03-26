<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV212signesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('12signes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('idProduct')->index('INDEX');
			$table->integer('Number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_12signes');
	}

}
