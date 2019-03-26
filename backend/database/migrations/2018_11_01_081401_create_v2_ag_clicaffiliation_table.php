<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AgClicaffiliationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ag_clicaffiliation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('dateCreation')->default('2018-01-01 00:00:00')->index('dateCreation');
			$table->integer('SitePromo')->default(0)->index('SitePromo');
			$table->integer('IDPlatformAffiliation')->default(0)->index('IDPlatformAffiliation');
			$table->integer('IDPlatformAffiliationSubID')->default(0)->index('IDPlatformAffiliationSubID');
			$table->integer('IDCampaign')->default(0)->index('IDCampaign');
			$table->string('Device', 100)->index('Device');
			$table->integer('NbClic')->default(0)->index('NbClic');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_ag_clicaffiliation');
	}

}
