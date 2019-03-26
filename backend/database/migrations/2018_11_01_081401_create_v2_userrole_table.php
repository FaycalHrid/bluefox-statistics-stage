<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2UserroleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userrole', function(Blueprint $table)
		{
			$table->integer('idUser');
			$table->integer('idRole')->default(0)->index('idRole_idx');
			$table->primary(['idUser','idRole']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_userrole');
	}

}
