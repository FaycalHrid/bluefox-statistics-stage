<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2LeadaffiliateplatformTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('leadaffiliateplatform', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlatfom', 'idAffiliatePlatformLAP')->references('id')->on('v2_affiliateplatform')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idUser', 'idUserLAP')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idAffiliatePlatformSubId', 'leadaffiliateplatform_ibfk_1')->references('id')->on('v2_affiliateplatformsubid')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idAffiliateCampaign', 'leadaffiliateplatform_ibfk_2')->references('id')->on('v2_affiliatecampaign')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idSite', 'leadaffiliateplatform_ibfk_3')->references('id')->on('v2_site')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('leadaffiliateplatform', function(Blueprint $table)
		{
			$table->dropForeign('idAffiliatePlatformLAP');
			$table->dropForeign('idUserLAP');
			$table->dropForeign('leadaffiliateplatform_ibfk_1');
			$table->dropForeign('leadaffiliateplatform_ibfk_2');
			$table->dropForeign('leadaffiliateplatform_ibfk_3');
		});
	}

}
