<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SplitflagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('splitflag', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idAnacondaSplitCampaign')->nullable()->index('fk_V2_SplitFlag_V2_AnacondaSplitCampaign1_idx');
			$table->string('site', 4)->nullable();
			$table->smallInteger('gp1')->nullable()->default(1);
			$table->smallInteger('gp2')->nullable()->default(1);
			$table->smallInteger('gp3')->nullable()->default(1);
			$table->smallInteger('gp4')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_splitflag');
	}

}
