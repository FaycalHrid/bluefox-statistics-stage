<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2RestrictionPaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restriction_paiement', function(Blueprint $table)
		{
			$table->integer('id')->default(0)->primary();
			$table->integer('id_product')->nullable()->index('id_product');
			$table->date('date_fin')->nullable();
			$table->integer('type_transaction')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_restriction_paiement');
	}

}
