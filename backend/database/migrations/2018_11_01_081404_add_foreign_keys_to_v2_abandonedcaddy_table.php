<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2AbandonedcaddyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('abandonedcaddy', function(Blueprint $table)
		{
			$table->foreign('idInvoice', 'idInvoiceAC')->references('id')->on('v2_invoice')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('abandonedcaddy', function(Blueprint $table)
		{
			$table->dropForeign('idInvoiceAC');
		});
	}

}
