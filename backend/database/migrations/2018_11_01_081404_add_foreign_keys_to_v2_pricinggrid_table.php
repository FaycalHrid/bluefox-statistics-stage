<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2PricinggridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pricinggrid', function(Blueprint $table)
		{
			$table->foreign('idSubCampaign', 'pricinggrid_ibfk_1')->references('id')->on('v2_subcampaign')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idSite', 'pricinggrid_ibfk_2')->references('id')->on('v2_site')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pricinggrid', function(Blueprint $table)
		{
			$table->dropForeign('pricinggrid_ibfk_1');
			$table->dropForeign('pricinggrid_ibfk_2');
		});
	}

}
