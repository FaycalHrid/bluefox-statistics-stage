<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2EtlclientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etlclient', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('guid', 36)->unique('guid_UNIQUE');
			$table->boolean('version');
			$table->text('name', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_etlclient');
	}

}
