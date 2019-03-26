<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2RoleauthorizationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roleauthorization', function(Blueprint $table)
		{
			$table->foreign('idAuthorization', 'idAuthorizationRA')->references('id')->on('v2_authorization')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idRole', 'idRoleRA')->references('id')->on('v2_role')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('roleauthorization', function(Blueprint $table)
		{
			$table->dropForeign('idAuthorizationRA');
			$table->dropForeign('idRoleRA');
		});
	}

}
