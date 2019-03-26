<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2SubcampaignreflationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcampaignreflation', function(Blueprint $table)
		{
			$table->foreign('idSubCampaign', 'subcampaignreflation_ibfk_1')->references('id')->on('v2_subcampaign')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcampaignreflation', function(Blueprint $table)
		{
			$table->dropForeign('subcampaignreflation_ibfk_1');
		});
	}

}
