<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2MediaalertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mediaalert', function(Blueprint $table)
		{
			$table->foreign('idComment', 'fk_V2_mediaAlert_V2_commentAlert1')->references('id')->on('v2_commentalert')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mediaalert', function(Blueprint $table)
		{
			$table->dropForeign('fk_V2_mediaAlert_V2_commentAlert1');
		});
	}

}
