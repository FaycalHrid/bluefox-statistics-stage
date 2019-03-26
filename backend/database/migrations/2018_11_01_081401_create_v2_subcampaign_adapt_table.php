<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SubcampaignAdaptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcampaign_adapt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idProduct');
			$table->integer('idCampaignAdapt');
			$table->string('link_mail');
			$table->string('page');
			$table->string('nb');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_subcampaign_adapt');
	}

}
