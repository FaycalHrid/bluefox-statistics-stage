<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CatalogemailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogemail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSubCampaignReflation')->index('fk_V2_catalogEmail_V2_subcampaignreflation1_idx');
			$table->integer('idUser')->index('fk_V2_catalogEmail_V2_user1_idx');
			$table->integer('idCampaign')->nullable();
			$table->timestamp('createDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('status')->nullable()->default(0)->comment('0:non achat|1:achat ');
			$table->boolean('played')->nullable()->default(0)->comment('pour savoir si un lead a jouer ou non par défaut 0 ');
			$table->dateTime('playedDate')->nullable();
			$table->unique(['idSubCampaignReflation','idUser'], 'idSubCampaignReflation');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_catalogemail');
	}

}
