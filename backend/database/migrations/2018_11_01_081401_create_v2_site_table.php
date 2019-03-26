<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code', 2)->index('code');
			$table->string('devise', 10);
			$table->string('codeDevise', 3);
			$table->string('nameDevise', 10);
			$table->string('country', 15);
			$table->string('company');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_site');
	}

}
