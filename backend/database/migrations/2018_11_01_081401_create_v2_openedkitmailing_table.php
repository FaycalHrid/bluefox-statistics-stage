<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2OpenedkitmailingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openedkitmailing', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idAffiliatePlatformSubID')->index('idAffiliateplatformsubid');
			$table->integer('idAffiliateCampaign')->index('idAffiliateCampaign');
			$table->timestamp('dateOpened')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('opened')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_openedkitmailing');
	}

}
