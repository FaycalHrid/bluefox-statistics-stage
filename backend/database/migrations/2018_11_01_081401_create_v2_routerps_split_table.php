<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RouterpsSplitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routerps_split', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idPromoSite');
			$table->boolean('splitPercent');
			$table->string('site', 5);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_routerps_split');
	}

}
