<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2ManagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('manager', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlatform', 'manager_ibfk_1')->references('id')->on('v2_affiliateplatform')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idUser', 'manager_ibfk_2')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('manager', function(Blueprint $table)
		{
			$table->dropForeign('manager_ibfk_1');
			$table->dropForeign('manager_ibfk_2');
		});
	}

}
