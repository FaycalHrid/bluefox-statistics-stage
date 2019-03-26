<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2UserroleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userrole', function(Blueprint $table)
		{
			$table->foreign('idRole', 'idRoleUR')->references('id')->on('v2_role')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idUser', 'idUserUR')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('userrole', function(Blueprint $table)
		{
			$table->dropForeign('idRoleUR');
			$table->dropForeign('idUserUR');
		});
	}

}
