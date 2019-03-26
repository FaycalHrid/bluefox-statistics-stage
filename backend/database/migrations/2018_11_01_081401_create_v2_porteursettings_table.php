<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PorteursettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('porteursettings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('display')->nullable();
			$table->integer('idFirstCampaign')->nullable();
			$table->boolean('periodAnaconda')->nullable();
			$table->integer('countImport')->nullable();
			$table->smallInteger('indiceFidGeante')->nullable();
			$table->smallInteger('periodInscriptionFidGeante')->nullable();
			$table->string('stcSplit', 10);
			$table->integer('currentStc');
			$table->boolean('periodVp')->nullable();
			$table->integer('initialReleve');
			$table->float('incrementRate', 5);
			$table->integer('numberOfSubdivisions')->default(0);
			$table->integer('periodReleve');
			$table->boolean('resendDeliveryTime')->default(2);
			$table->smallInteger('durationToBan')->nullable()->default(31);
			$table->integer('maxSignup')->default(3)->comment('get the last [maxSup] signup item from loadAffiliatePlatform table');
			$table->boolean('periodAsile')->default(10);
			$table->integer('periodReleveNP')->default(10)->comment('  number of days to check the last reflation');
			$table->boolean('indiceActivityHour')->nullable();
			$table->smallInteger('interAccountInterval');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_porteursettings');
	}

}
