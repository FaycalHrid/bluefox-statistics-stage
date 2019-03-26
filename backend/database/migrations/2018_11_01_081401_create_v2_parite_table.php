<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2PariteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parite', function(Blueprint $table)
		{
			$table->integer('client_db');
			$table->string('deviseSource', 3);
			$table->string('deviseDestin', 3);
			$table->decimal('parite', 13, 6);
			$table->date('dateAjout');
			$table->primary(['client_db','deviseSource','deviseDestin','dateAjout']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_parite');
	}

}
