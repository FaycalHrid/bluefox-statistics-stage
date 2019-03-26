<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2EetransactionstatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eetransactionstatus', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSubCampaignReflation')->index('fk_V2_EETransactionStatus_V2_subcampaignreflation1_idx');
			$table->string('transactionId', 250)->nullable();
			$table->dateTime('sendDate')->nullable();
			$table->string('status', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_eetransactionstatus');
	}

}
