<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RecordinvoiceannexeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recordinvoiceannexe', function(Blueprint $table)
		{
			$table->integer('idPoste')->primary();
			$table->text('productExt', 65535)->nullable()->comment('EMV Data json');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_recordinvoiceannexe');
	}

}
