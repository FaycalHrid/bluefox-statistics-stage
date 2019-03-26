<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2StatsaffiliationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statsaffiliation', function(Blueprint $table)
		{
			$table->integer('client_db');
			$table->date('Date')->index('Date');
			$table->integer('IDAffiliatePlatform')->index('IDAffiliatePlatform');
			$table->integer('IDAffiliatePlatformSubId')->index('IDAffiliatePlatformSubId');
			$table->integer('IDAffiliateCampaign')->index('IDAffiliateCampaign');
			$table->integer('NbClic')->default(0);
			$table->integer('NbUniqueClic')->default(0);
			//$table->primary(['client_db','Date','IDAffiliatePlatform','IDAffiliatePlatformSubId','IDAffiliateCampaign']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_statsaffiliation');
	}

}
