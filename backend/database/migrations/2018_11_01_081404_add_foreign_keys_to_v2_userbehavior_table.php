<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2UserbehaviorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userbehavior', function(Blueprint $table)
		{
			$table->foreign('idCampaignHistory', 'fk_V2_userbehavior_V2_campaignhistory1')->references('id')->on('v2_campaignhistory')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('userbehavior', function(Blueprint $table)
		{
			$table->dropForeign('fk_V2_userbehavior_V2_campaignhistory1');
		});
	}

}
