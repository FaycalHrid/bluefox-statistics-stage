<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PorteurCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('porteur_company', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('porteur', 30);
			$table->string('porteur_abr', 20);
			$table->string('site', 5);
			$table->string('company', 30);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_porteur_company');
	}

}
