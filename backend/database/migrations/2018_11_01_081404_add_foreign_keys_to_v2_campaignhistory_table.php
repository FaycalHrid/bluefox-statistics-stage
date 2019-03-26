<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2CampaignhistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campaignhistory', function(Blueprint $table)
		{
			$table->foreign('idSubCampaign', 'fk_V2_campaignhistory_V2_subcampaign1')->references('id')->on('v2_subcampaign')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idUser', 'fk_V2_champs_V2_user1')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('campaignhistory', function(Blueprint $table)
		{
			$table->dropForeign('fk_V2_campaignhistory_V2_subcampaign1');
			$table->dropForeign('fk_V2_champs_V2_user1');
		});
	}

}
