<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AffiliatecampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiliatecampaign', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label', 50);
			$table->string('description', 100);
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_affiliatecampaign');
	}

}
