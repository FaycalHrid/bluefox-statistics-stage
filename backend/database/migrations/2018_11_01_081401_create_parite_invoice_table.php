<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePariteInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ite_invoice', function(Blueprint $table)
		{
			$table->integer('id_parite', true);
			$table->decimal('parite', 13, 6)->default(1.000000);
			$table->string('devise', 3)->default('EUR');
			$table->timestamp('updateDate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parite_invoice');
	}

}
