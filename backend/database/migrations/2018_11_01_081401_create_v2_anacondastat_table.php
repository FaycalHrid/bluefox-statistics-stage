<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AnacondastatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anacondastat', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hardBounce')->nullable();
			$table->integer('softBounce')->nullable();
			$table->dateTime('dateStat')->nullable();
			$table->integer('idSubCampaignReflation')->index('fk_v2_anacondaStat_v2_subcampaignreflation1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_anacondastat');
	}

}
