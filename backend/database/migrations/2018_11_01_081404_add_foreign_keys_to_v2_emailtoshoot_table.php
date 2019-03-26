<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2EmailtoshootTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('emailtoshoot', function(Blueprint $table)
		{
			$table->foreign('idSubCampaignReflation', 'fk_V2_emailtoshoot_V2_subcampaignreflation1')->references('id')->on('v2_subcampaignreflation')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idUser', 'fk_V2_emailtoshoot_V2_user1')->references('id')->on('v2_user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('emailtoshoot', function(Blueprint $table)
		{
			$table->dropForeign('fk_V2_emailtoshoot_V2_subcampaignreflation1');
			$table->dropForeign('fk_V2_emailtoshoot_V2_user1');
		});
	}

}
