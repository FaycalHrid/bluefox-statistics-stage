<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AccounthistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounthistory', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idUser')->index('idUser');
			$table->string('profile', 3);
			$table->date('createDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_accounthistory');
	}

}
