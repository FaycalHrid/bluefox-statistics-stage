<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AnacondasettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anacondasettings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('groupPrice')->nullable();
			$table->boolean('nextStepSum')->nullable();
			$table->boolean('previousStepClicks')->nullable();
			$table->boolean('durationNext')->nullable();
			$table->boolean('durationPrevious')->nullable();
			$table->integer('idFirstCampaign')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_anacondasettings');
	}

}
