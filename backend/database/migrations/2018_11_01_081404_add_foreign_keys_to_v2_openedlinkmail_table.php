<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2OpenedlinkmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('openedlinkmail', function(Blueprint $table)
		{
			$table->foreign('idUser', 'V2_openedlinkmail_ibfk_1')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idSubCampaignReflation', 'V2_openedlinkmail_ibfk_2')->references('id')->on('v2_subcampaignreflation')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('openedlinkmail', function(Blueprint $table)
		{
			$table->dropForeign('V2_openedlinkmail_ibfk_1');
			$table->dropForeign('V2_openedlinkmail_ibfk_2');
		});
	}

}
