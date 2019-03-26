<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2RecordinvoiceannexeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('recordinvoiceannexe', function(Blueprint $table)
		{
			$table->foreign('idPoste', 'recordinvoiceannexe_ibfk_1')->references('id')->on('v2_recordinvoice')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('recordinvoiceannexe', function(Blueprint $table)
		{
			$table->dropForeign('recordinvoiceannexe_ibfk_1');
		});
	}

}
