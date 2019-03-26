<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2LogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idUser')->nullable()->index('INDEX');
			$table->string('supportRef', 20)->nullable();
			$table->date('supportDate')->nullable();
			$table->boolean('actionType')->nullable();
			$table->integer('idProduct')->nullable()->index('idProduct_idx');
			$table->integer('idAffiliatePlatform')->default(0)->index('idAffiliatePlatform');
			$table->integer('idAffiliateCampaign')->default(0)->index('idAffiliateCampaign');
			$table->integer('idAffiliatePlatformSubId')->default(0)->index('idAffiliatePlatformSubId');
			$table->integer('idPromoSite')->nullable()->default(0);
			$table->dateTime('actionDate')->nullable()->index('actionDate');
			$table->string('email', 100)->nullable();
			$table->string('ip', 45)->index('ip');
			$table->string('userAgent', 100)->nullable();
			$table->text('queryString', 65535)->nullable();
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
			$table->string('device', 100)->nullable();
			$table->index(['actionType','ip','actionDate'], 'actionType_ip_actionDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_log');
	}

}
