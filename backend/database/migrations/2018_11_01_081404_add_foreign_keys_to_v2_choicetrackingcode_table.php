<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2ChoicetrackingcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('choicetrackingcode', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlatform', 'choiceTrackingCode_ibfk_1')->references('id')->on('v2_affiliateplatform')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idAffiliateCampaign', 'choiceTrackingCode_ibfk_2')->references('id')->on('v2_affiliatecampaign')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idAffiliatePlatformSubId', 'choiceTrackingCode_ibfk_3')->references('id')->on('v2_affiliateplatformsubid')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idTrackingCode', 'choiceTrackingCode_ibfk_4')->references('id')->on('v2_trackingcode')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('choicetrackingcode', function(Blueprint $table)
		{
			$table->dropForeign('choiceTrackingCode_ibfk_1');
			$table->dropForeign('choiceTrackingCode_ibfk_2');
			$table->dropForeign('choiceTrackingCode_ibfk_3');
			$table->dropForeign('choiceTrackingCode_ibfk_4');
		});
	}

}
