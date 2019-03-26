<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CdcAdaptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cdc_adapt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idCampaign')->index('idCampagn');
			$table->string('ref', 20);
			$table->string('label', 254)->nullable();
			$table->string('sites', 254)->nullable();
			$table->boolean('projectStatus')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_cdc_adapt');
	}

}
