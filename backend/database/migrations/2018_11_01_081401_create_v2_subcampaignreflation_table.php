<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SubcampaignreflationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcampaignreflation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('number')->nullable();
			$table->integer('idSubCampaign')->nullable()->index('idCampaign_idx');
			$table->integer('offsetPriceStep')->nullable();
			$table->text('IdSubCampaingCryp', 65535)->nullable();
			$table->string('view', 50)->nullable();
			$table->string('emailView', 50)->nullable();
			$table->string('templateProd', 50)->nullable();
			$table->boolean('isDeliveryView')->nullable()->default(0);
			$table->string('gameName', 256)->nullable()->comment('the name of the game specifed for this SCR');
			$table->integer('idCatalog')->nullable();
			$table->string('gameType', 50)->nullable()->comment('the congrte page name');
			$table->unique(['number','idSubCampaign'], 'number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_subcampaignreflation');
	}

}
