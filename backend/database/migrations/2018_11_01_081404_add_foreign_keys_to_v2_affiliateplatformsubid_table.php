<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2AffiliateplatformsubidTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('affiliateplatformsubid', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlatform', 'fk_AffiliatePlatformSubId_AffiliatePlatform1')->references('id')->on('v2_affiliateplatform')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('affiliateplatformsubid', function(Blueprint $table)
		{
			$table->dropForeign('fk_AffiliatePlatformSubId_AffiliatePlatform1');
		});
	}

}
