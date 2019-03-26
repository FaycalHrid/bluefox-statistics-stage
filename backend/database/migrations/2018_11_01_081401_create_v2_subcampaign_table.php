<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SubcampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcampaign', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idCampaign');
			$table->integer('position');
			$table->integer('idProduct')->index('idProduct');
			$table->index(['idCampaign','position','idProduct'], 'idCampaign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_subcampaign');
	}

}
