<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RouterpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routerps', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idAffiliatePlatform')->nullable()->index('idAffiliatePlatform');
			$table->integer('idAffiliateCampaign')->nullable()->index('idAffiliateCampaign');
			$table->integer('idAffiliatePlatformSubId')->nullable()->index('idAffiliatePlatformSubId');
			$table->integer('idPromoSite')->index('idPromoSite');
			$table->string('site', 5);
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_routerps');
	}

}
