<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PaymentprocessortypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentprocessortype', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSite')->index('idSite');
			$table->string('name', 50)->nullable()->index('INDEX');
			$table->boolean('type')->comment('0 => free, 1 => CB, 2 => cheque, 3 => boletos');
			$table->string('className', 50)->nullable();
			$table->string('ref', 100)->unique('ref');
			$table->string('description', 250);
			$table->text('param', 65535);
			$table->string('langPP', 25)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_paymentprocessortype');
	}

}
