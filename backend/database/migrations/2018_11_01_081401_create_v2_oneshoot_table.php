<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2OneshootTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneshoot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idCampaign');
			$table->boolean('shootNumber');
			$table->date('startDate')->nullable();
			$table->date('endDate')->nullable();
			$table->boolean('reflationGap')->nullable();
			$table->float('incrementRate', 5)->nullable();
			$table->boolean('deliveryTime')->nullable();
			$table->string('shootHour', 10)->nullable();
			$table->boolean('deliverHour')->nullable();
			$table->boolean('status')->nullable()->comment('0:actif|1:terminé');
			$table->index(['idCampaign','shootNumber'], 'idCampaign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_oneshoot');
	}

}
