<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2TemplateinvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templateinvoice', function(Blueprint $table)
		{
			$table->integer('IdTemplate');
			$table->integer('IdInvoice');
			$table->primary(['IdTemplate','IdInvoice']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_templateinvoice');
	}

}
