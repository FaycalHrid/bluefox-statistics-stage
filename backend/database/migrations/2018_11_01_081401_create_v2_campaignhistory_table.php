<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CampaignhistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaignhistory', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('modifiedShootDate')->nullable();
			$table->date('initialShootDate')->nullable();
			$table->boolean('groupPrice')->nullable();
			$table->string('status', 10)->nullable();
			$table->date('deliveryDate')->nullable();
			$table->boolean('behaviorHour')->nullable();
			$table->integer('idUser')->index('fk_V2_champs_V2_user1_idx');
			$table->integer('idSubCampaign')->nullable()->index('fk_V2_campaignhistory_V2_subcampaign1_idx');
			$table->boolean('bs')->nullable()->default(1);
			$table->boolean('supposedGp')->nullable();
			$table->date('dateStb')->nullable();
			$table->date('shooteDateLastReflation')->nullable();
			$table->smallInteger('position')->nullable();
			$table->integer('intentBy')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_campaignhistory');
	}

}
