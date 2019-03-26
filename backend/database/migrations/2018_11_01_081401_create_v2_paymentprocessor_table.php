<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PaymentprocessorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentprocessor', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('client_db');
			$table->integer('client_id');
			$table->string('name', 50)->nullable();
			$table->boolean('type')->nullable()->index('INDEX');
			$table->string('className', 50)->nullable();
			$table->string('ref', 100)->nullable();
			$table->string('description', 250)->nullable();
			$table->text('param', 65535)->nullable();
			$table->unique(['client_db','client_id'], 'client_db_client_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_paymentprocessor');
	}

}
