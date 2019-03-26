<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2BudgetaffiliateplateformTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('budgetaffiliateplateform', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlateform', 'V2_budgetAffiliatePlateform_ibfk_1')->references('id')->on('v2_affiliateplatform')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('budgetaffiliateplateform', function(Blueprint $table)
		{
			$table->dropForeign('V2_budgetAffiliatePlateform_ibfk_1');
		});
	}

}
