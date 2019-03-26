<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2LeadaffiliateplatformTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leadaffiliateplatform', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idUser')->nullable();
			$table->integer('idAffiliatePlatfom')->nullable();
			$table->integer('idAffiliatePlatformSubId')->nullable()->index('idAffiliatePlatformSubId');
			$table->integer('idAffiliateCampaign')->nullable()->index('idAffiliateCampaign');
			$table->integer('idSite')->default(1)->index('idSite');
			$table->dateTime('creationDate')->nullable();
			$table->string('promo', 50)->nullable();
			$table->boolean('isDouble')->nullable();
			$table->boolean('doubleOptin')->default(0);
			$table->integer('idTrackingCodeV2')->nullable();
			$table->boolean('Payed')->nullable()->default(0);
			$table->string('device', 100)->nullable()->index('device');
			$table->string('paramAffilie', 100)->nullable();
			$table->string('AffSource', 50)->nullable();
			$table->string('porteursource', 50)->nullable();
			$table->string('campsource', 50)->nullable();
			$table->string('subSource', 50)->nullable();
			$table->boolean('isDoSend')->default(0);
			$table->index(['idUser','idAffiliatePlatfom'], 'INDEX');
			$table->index(['idAffiliatePlatfom','creationDate'], 'idAffiliatePlatfom_creationDate');
			$table->index(['creationDate','idAffiliateCampaign'], 'creationDate_idAffiliateCampaign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_leadaffiliateplatform');
	}

}
