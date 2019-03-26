<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2BudgetaffiliateplateformTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budgetaffiliateplateform', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->decimal('budget', 13, 3)->default(0.000);
			$table->string('date', 11);
			$table->integer('idAffiliatePlateform')->index('idAffiliatePlatfom');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_budgetaffiliateplateform');
	}

}
