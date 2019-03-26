<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2ReflationuserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reflationuser', function(Blueprint $table)
		{
			$table->foreign('idSubCampaignReflation', 'fk_reflation_id')->references('id')->on('v2_subcampaignreflation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idUser', 'fk_user_id')->references('id')->on('v2_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reflationuser', function(Blueprint $table)
		{
			$table->dropForeign('fk_reflation_id');
			$table->dropForeign('fk_user_id');
		});
	}

}
