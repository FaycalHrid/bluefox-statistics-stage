<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToV2RestrictionPaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('restriction_paiement', function(Blueprint $table)
		{
			$table->foreign('id_product', 'V2_restriction_paiement_ibfk_1')->references('id')->on('v2_product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('restriction_paiement', function(Blueprint $table)
		{
			$table->dropForeign('V2_restriction_paiement_ibfk_1');
		});
	}

}
