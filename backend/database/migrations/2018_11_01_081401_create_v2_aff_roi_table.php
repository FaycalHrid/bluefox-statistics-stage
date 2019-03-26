<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AffRoiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aff_roi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idAffiliatePlatform')->index('idAffiliatePlatform');
			$table->date('dateInvoice');
			$table->float('montant', 10, 0)->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_aff_roi');
	}

}
