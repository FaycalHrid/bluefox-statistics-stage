<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2AffiliateplatformTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('affiliateplatform', function(Blueprint $table)
		{
			$table->foreign('idSite', 'V2_affiliateplatform_ibfk_1')->references('id')->on('v2_site')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('affiliateplatform', function(Blueprint $table)
		{
			$table->dropForeign('V2_affiliateplatform_ibfk_1');
		});
	}

}
