<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AffiliateplatformsubidTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiliateplatformsubid', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idAffiliatePlatform')->nullable();
			$table->string('subID', 50)->nullable();
			$table->string('label', 50)->nullable();
			$table->string('description', 100);
			$table->boolean('forceEmpty');
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
			$table->boolean('actif')->default(1);
			$table->index(['idAffiliatePlatform','subID'], 'INDEX');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_affiliateplatformsubid');
	}

}
