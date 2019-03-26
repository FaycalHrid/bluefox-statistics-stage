<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2AbandonedcaddyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abandonedcaddy', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('type')->nullable();
			$table->integer('idInvoice')->index('idInvoice_idx');
			$table->dateTime('creationDate')->nullable();
			$table->dateTime('alertDate')->nullable();
			$table->boolean('status')->nullable();
			$table->text('journal', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_abandonedcaddy');
	}

}
