<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2RequestrouteremvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('requestrouteremv', function(Blueprint $table)
		{
			$table->foreign('idProduct', 'requestRouterEMV_ibfk_1')->references('id')->on('v2_product')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idUser', 'requestRouterEMV_ibfk_2')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idInvoice', 'requestRouterEMV_ibfk_3')->references('id')->on('v2_invoice')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('requestrouteremv', function(Blueprint $table)
		{
			$table->dropForeign('requestRouterEMV_ibfk_1');
			$table->dropForeign('requestRouterEMV_ibfk_2');
			$table->dropForeign('requestRouterEMV_ibfk_3');
		});
	}

}
