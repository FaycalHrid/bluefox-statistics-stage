<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CampaignmodelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaignmodel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label');
			$table->integer('Modelpurchase')->nullable()->default(0)->comment('0 = No lead, 1 = lead');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_campaignmodel');
	}

}
