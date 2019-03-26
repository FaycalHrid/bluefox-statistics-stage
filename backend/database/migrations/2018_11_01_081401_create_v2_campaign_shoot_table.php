<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CampaignShootTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaign_shoot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_campaign')->index('id_campaign');
			$table->string('population', 250)->nullable();
			$table->string('groupe_prix', 250)->nullable();
			$table->string('selection', 250)->nullable();
			$table->date('date_prem_shoot')->nullable();
			$table->string('jours_shoot', 254)->nullable();
			$table->integer('comptage')->nullable();
			$table->string('compte', 5)->nullable()->default('Acq');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_campaign_shoot');
	}

}
