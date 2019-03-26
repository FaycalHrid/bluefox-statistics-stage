<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PricinggridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pricinggrid', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSubCampaign')->nullable();
			$table->integer('idSite')->index('idSite');
			$table->string('refBatchSelling', 5)->nullable();
			$table->integer('priceStep')->nullable();
			$table->string('refPricingGrid', 5)->nullable();
			$table->integer('priceATI')->nullable();
			$table->integer('priceVAT');
			$table->float('prixTheorique', 10, 0);
			$table->index(['idSubCampaign','priceStep'], 'INDEX');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_pricinggrid');
	}

}
