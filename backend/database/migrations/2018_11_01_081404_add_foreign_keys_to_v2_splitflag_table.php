<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2SplitflagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('splitflag', function(Blueprint $table)
		{
			$table->foreign('idAnacondaSplitCampaign', 'fk_V2_SplitFlag_V2_AnacondaSplitCampaign1')->references('id')->on('v2_anacondasplitcampaign')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('splitflag', function(Blueprint $table)
		{
			$table->dropForeign('fk_V2_SplitFlag_V2_AnacondaSplitCampaign1');
		});
	}

}
