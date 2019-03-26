<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2OpenedlinkmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openedlinkmail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('openedDate')->nullable();
			$table->integer('idUser')->index('idUser');
			$table->integer('idSubCampaignReflation')->index('idSubCampaignReflation');
			$table->integer('activityHour')->nullable();
			$table->date('modifiedShootDate')->nullable();
			$table->integer('shiftDe')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_openedlinkmail');
	}

}
