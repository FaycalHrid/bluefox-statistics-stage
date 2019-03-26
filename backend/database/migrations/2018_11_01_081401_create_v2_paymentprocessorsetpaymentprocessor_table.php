<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PaymentprocessorsetpaymentprocessorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentprocessorsetpaymentprocessor', function(Blueprint $table)
		{
			$table->integer('idPaymentProcessorSet');
			$table->integer('idPaymentProcessorType')->index('idPaymentProcessorType');
			$table->integer('position');
			//$table->primary(['idPaymentProcessorSet','idPaymentProcessorType']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_paymentprocessorsetpaymentprocessor');
	}

}
