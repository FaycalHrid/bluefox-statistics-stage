<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2SuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ref', 20);
			$table->string('parent', 20)->nullable();
			$table->float('gain', 5)->default(10.00);
			$table->string('login', 50)->nullable();
			$table->string('password', 50)->nullable();
			$table->boolean('originNumber')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_suppliers');
	}

}
