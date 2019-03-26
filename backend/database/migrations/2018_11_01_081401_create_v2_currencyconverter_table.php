<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CurrencyconverterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currencyconverter', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('date');
			$table->decimal('currency', 10, 8);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_currencyconverter');
	}

}
