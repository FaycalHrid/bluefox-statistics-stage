<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2OneshootTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('oneshoot', function(Blueprint $table)
		{
			$table->foreign('idCampaign', 'oneShoot_ibfk_1')->references('id')->on('v2_campaign')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('oneshoot', function(Blueprint $table)
		{
			$table->dropForeign('oneShoot_ibfk_1');
		});
	}

}
