<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RequestrouteremvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requestrouteremv', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idProduct')->index('idProduct');
			$table->integer('idUser')->index('idUser');
			$table->integer('idInvoice')->index('idInvoice');
			$table->string('email', 100);
			$table->string('type', 24);
			$table->string('compteEMV', 24);
			$table->dateTime('creationDate');
			$table->dateTime('executionDate');
			$table->boolean('executed');
			$table->boolean('response');
			$table->text('url', 65535);
			$table->index(['executed','creationDate'], 'executed_creationDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_requestrouteremv');
	}

}
