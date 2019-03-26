<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV212signesVariablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('12signes_variables', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_signe')->index('INDEX');
			$table->string('name');
			$table->text('value', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_12signes_variables');
	}

}
