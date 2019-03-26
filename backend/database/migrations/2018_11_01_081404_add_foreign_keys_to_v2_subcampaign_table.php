<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2SubcampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcampaign', function(Blueprint $table)
		{
			$table->foreign('idCampaign', 'subcampaign_ibfk_1')->references('id')->on('v2_campaign')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idProduct', 'subcampaign_ibfk_2')->references('id')->on('v2_product')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcampaign', function(Blueprint $table)
		{
			$table->dropForeign('subcampaign_ibfk_1');
			$table->dropForeign('subcampaign_ibfk_2');
		});
	}

}
