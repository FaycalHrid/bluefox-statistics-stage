<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('key', 50)->nullable()->index('key');
			$table->string('value', 254)->nullable();
			$table->timestamp('updateTS')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
			$table->string('idSite', 2)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_config');
	}

}
