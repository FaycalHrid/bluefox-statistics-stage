<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2DefaultPricinggridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('default_pricinggrid', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('refBatchSelling', 5)->default('1');
			$table->integer('priceStep')->nullable();
			$table->string('refPricingGrid', 5)->nullable();
			$table->decimal('priceATI', 10)->nullable();
			$table->integer('priceVAT');
			$table->float('prixTheorique', 10, 0);
			$table->integer('nbrProduct')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_default_pricinggrid');
	}

}
