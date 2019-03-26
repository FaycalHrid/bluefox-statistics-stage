<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2OpenedkitmailingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('openedkitmailing', function(Blueprint $table)
		{
			$table->foreign('idAffiliatePlatformSubID', 'V2_openedKitMailing_ibfk_1')->references('id')->on('v2_affiliateplatformsubid')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idAffiliateCampaign', 'V2_openedKitMailing_ibfk_2')->references('id')->on('v2_affiliatecampaign')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('openedkitmailing', function(Blueprint $table)
		{
			$table->dropForeign('V2_openedKitMailing_ibfk_1');
			$table->dropForeign('V2_openedKitMailing_ibfk_2');
		});
	}

}
