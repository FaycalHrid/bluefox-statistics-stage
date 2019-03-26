<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2StcsettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stcsetting', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSubCampaign')->index('idSubCampaign');
			$table->boolean('reflationGap')->nullable();
			$table->boolean('deliveryTime')->nullable();
			$table->string('shootHour', 10)->nullable();
			$table->boolean('deliverHour')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_stcsetting');
	}

}
