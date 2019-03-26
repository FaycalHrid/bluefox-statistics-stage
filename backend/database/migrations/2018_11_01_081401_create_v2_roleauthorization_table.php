<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RoleauthorizationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roleauthorization', function(Blueprint $table)
		{
			$table->integer('idRole')->default(0);
			$table->integer('idAuthorization')->default(0)->index('idAuthorization_idx');
			$table->primary(['idRole','idAuthorization']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_roleauthorization');
	}

}
