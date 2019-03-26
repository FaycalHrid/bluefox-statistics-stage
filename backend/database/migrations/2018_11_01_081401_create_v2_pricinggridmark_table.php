<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PricinggridmarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pricinggridmark', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSubCampaign')->nullable();
			$table->integer('idSite')->index('idSite');
			$table->string('refBatchSelling', 5)->nullable();
			$table->integer('priceStep')->nullable();
			$table->string('refPricingGrid', 5)->nullable();
			$table->decimal('priceATI', 10)->nullable();
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
		Schema::drop('v2_pricinggridmark');
	}

}
