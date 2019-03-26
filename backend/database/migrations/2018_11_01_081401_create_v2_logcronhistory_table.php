<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2LogcronhistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logcronhistory', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->boolean('status');
			$table->string('porteur', 20);
			$table->text('cronLog', 65535);
			$table->integer('supposedShooted');
			$table->integer('shooted');
			$table->dateTime('createDate');
			$table->timestamp('updateDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('idLogCron')->index('idLogCron');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_logcronhistory');
	}

}
