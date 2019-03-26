<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AffiliateplatformTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiliateplatform', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label', 50)->nullable();
			$table->string('description', 100)->nullable()->index('INDEX');
			$table->boolean('active');
			$table->integer('idSite')->index('idSite');
			$table->boolean('isDualOptin')->default(0);
			$table->decimal('DoublePayedPerc', 9, 5)->nullable();
			$table->integer('MinYearOld')->nullable();
			$table->integer('IDAcquisitionCanal');
			$table->integer('IDCampaignModel');
			$table->decimal('PricePurchase', 13, 3);
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
			$table->boolean('is_bridage')->default(0);
			$table->boolean('PixelS2S')->nullable();
			$table->boolean('ClickID')->nullable()->default(0);
			$table->decimal('Cplreconst', 13, 3)->default(0.000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_affiliateplatform');
	}

}
