<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RecordinvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recordinvoice', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idInvoice')->nullable()->index('idInvoiceRI_idx');
			$table->string('refProduct', 20)->nullable();
			$table->integer('qty')->nullable();
			$table->decimal('priceATI', 10)->nullable();
			$table->decimal('priceVAT', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_recordinvoice');
	}

}
