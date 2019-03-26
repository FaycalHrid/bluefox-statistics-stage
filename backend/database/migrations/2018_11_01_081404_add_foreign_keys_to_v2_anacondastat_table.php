<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2AnacondastatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('anacondastat', function(Blueprint $table)
		{
			$table->foreign('idSubCampaignReflation', 'fk_v2_anacondaStat_v2_subcampaignreflation1')->references('id')->on('v2_subcampaignreflation')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('anacondastat', function(Blueprint $table)
		{
			$table->dropForeign('fk_v2_anacondaStat_v2_subcampaignreflation1');
		});
	}

}
