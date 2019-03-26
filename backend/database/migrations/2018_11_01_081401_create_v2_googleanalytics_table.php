<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2GoogleanalyticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('googleanalytics', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('elementType', 100)->comment('site affilier, MonoOffre, Mainchain, initialChain..  ');
			$table->string('ref', 100)->comment('reference d\'element');
			$table->string('code', 50)->index('code')->comment('ID google analytic');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_googleanalytics');
	}

}
