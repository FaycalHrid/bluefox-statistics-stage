<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ManagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manager', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idAffiliatePlatform')->index('idAffiliatePlatform');
			$table->integer('idUser')->index('idUser');
			$table->integer('type')->comment('0 => strategique, 1 => operationnel');
			$table->dateTime('dateStart');
			$table->dateTime('dateEnd');
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_manager');
	}

}
