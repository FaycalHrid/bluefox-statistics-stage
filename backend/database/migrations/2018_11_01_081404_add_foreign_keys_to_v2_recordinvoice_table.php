<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2RecordinvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('recordinvoice', function(Blueprint $table)
		{
			$table->foreign('idInvoice', 'idInvoiceRI')->references('id')->on('v2_invoice')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('recordinvoice', function(Blueprint $table)
		{
			$table->dropForeign('idInvoiceRI');
		});
	}

}
