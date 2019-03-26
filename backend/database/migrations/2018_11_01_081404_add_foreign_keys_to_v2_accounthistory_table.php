<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2AccounthistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accounthistory', function(Blueprint $table)
		{
			$table->foreign('idUser', 'V2_AccountHistory_ibfk_1')->references('id')->on('v2_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accounthistory', function(Blueprint $table)
		{
			$table->dropForeign('V2_AccountHistory_ibfk_1');
		});
	}

}
