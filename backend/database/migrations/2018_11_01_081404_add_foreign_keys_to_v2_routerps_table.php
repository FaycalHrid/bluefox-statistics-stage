<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2RouterpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('routerps', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlatform', 'routerPS_ibfk_1')->references('id')->on('v2_affiliateplatform')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idAffiliateCampaign', 'routerPS_ibfk_2')->references('id')->on('v2_affiliatecampaign')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idAffiliatePlatformSubId', 'routerPS_ibfk_3')->references('id')->on('v2_affiliateplatformsubid')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idPromoSite', 'routerPS_ibfk_4')->references('id')->on('v2_promosite')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('routerps', function(Blueprint $table)
		{
			$table->dropForeign('routerPS_ibfk_1');
			$table->dropForeign('routerPS_ibfk_2');
			$table->dropForeign('routerPS_ibfk_3');
			$table->dropForeign('routerPS_ibfk_4');
		});
	}

}
