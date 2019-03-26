<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2TrackingcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trackingcode', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('TCLeadPromo', 65535)->nullable();
			$table->text('TCLandingPagePromo', 65535)->nullable();
			$table->text('TCPrePurchase', 65535)->nullable();
			$table->text('TCPurchase', 65535)->nullable();
			$table->text('TCLead', 65535)->nullable();
			$table->text('TCLandingPage', 65535)->nullable();
			$table->text('TCDualOptin', 65535);
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
			$table->text('TCLeadCoreg', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_trackingcode');
	}

}
