<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2EvtemvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evtemv', function(Blueprint $table)
		{
			$table->foreign('idUser', 'idUserEE')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('evtemv', function(Blueprint $table)
		{
			$table->dropForeign('idUserEE');
		});
	}

}
