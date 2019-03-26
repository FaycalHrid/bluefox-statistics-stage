<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2CampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campaign', function(Blueprint $table)
		{
			$table->foreign('idLotCampaign', 'V2_campaign_ibfk_1')->references('id')->on('v2_lotcampaign')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idChain', 'fk_V2_campaign_V2_chain')->references('id')->on('v2_chain')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('campaign', function(Blueprint $table)
		{
			$table->dropForeign('V2_campaign_ibfk_1');
			$table->dropForeign('fk_V2_campaign_V2_chain');
		});
	}

}
