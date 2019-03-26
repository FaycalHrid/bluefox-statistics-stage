<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2EvtemvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evtemv', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idUser')->nullable()->index('idUser_idx');
			$table->integer('idProduct')->nullable()->index('idProduct_idx');
			$table->date('creationDate')->nullable();
			$table->string('SavStatus', 10)->nullable();
			$table->date('sendDateSav')->nullable();
			$table->text('Url', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_evtemv');
	}

}
