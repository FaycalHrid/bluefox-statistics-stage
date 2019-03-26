<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2UserbehaviorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userbehavior', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('lastDateClick')->nullable();
			$table->boolean('reflation')->nullable();
			$table->boolean('bdcClicks')->nullable();
			$table->integer('idCampaignHistory')->default(0)->index('fk_V2_userbehavior_V2_campaignhistory1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_userbehavior');
	}

}
