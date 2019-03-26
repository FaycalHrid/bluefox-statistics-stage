<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2UserPorteurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_porteur', function(Blueprint $table)
		{
			$table->foreign('porteur', 'V2_user_porteur_ibfk_1')->references('id')->on('v2_porteur_company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_porteur', function(Blueprint $table)
		{
			$table->dropForeign('V2_user_porteur_ibfk_1');
		});
	}

}
