<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PromositeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promosite', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label', 50);
			$table->string('description', 100);
			$table->text('url', 65535);
			$table->timestamp('updateTS')->default(DB::raw('CURRENT_TIMESTAMP'))->index('updateTS');
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
		Schema::drop('v2_promosite');
	}

}
