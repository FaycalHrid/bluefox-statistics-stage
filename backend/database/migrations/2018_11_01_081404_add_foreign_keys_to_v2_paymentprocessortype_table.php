<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2PaymentprocessortypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paymentprocessortype', function(Blueprint $table)
		{
			$table->foreign('idSite', 'paymentprocessortype_ibfk_1')->references('id')->on('v2_site')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paymentprocessortype', function(Blueprint $table)
		{
			$table->dropForeign('paymentprocessortype_ibfk_1');
		});
	}

}
