<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2DashboardCoutsfactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dashboard_coutsfact', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('mois', 10);
			$table->integer('plateforme');
			$table->float('montant', 10, 0)->default(0);
			$table->string('site', 2);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_dashboard_coutsfact');
	}

}
