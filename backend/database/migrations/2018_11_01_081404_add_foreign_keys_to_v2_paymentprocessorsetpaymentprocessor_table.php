<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2PaymentprocessorsetpaymentprocessorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paymentprocessorsetpaymentprocessor', function(Blueprint $table)
		{
			$table->foreign('idPaymentProcessorSet', 'paymentprocessorsetpaymentprocessor_ibfk_1')->references('id')->on('v2_paymentprocessorset')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idPaymentProcessorType', 'paymentprocessorsetpaymentprocessor_ibfk_2')->references('id')->on('v2_paymentprocessortype')->onUpdate('NO ACTION')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paymentprocessorsetpaymentprocessor', function(Blueprint $table)
		{
			$table->dropForeign('paymentprocessorsetpaymentprocessor_ibfk_1');
			$table->dropForeign('paymentprocessorsetpaymentprocessor_ibfk_2');
		});
	}

}
