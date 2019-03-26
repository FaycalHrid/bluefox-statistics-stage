<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CrmfournisseurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crmfournisseur', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label')->nullable();
			$table->string('description')->nullable();
			$table->string('site');
			$table->string('TM', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_crmfournisseur');
	}

}
