<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2EmailtoshootTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emailtoshoot', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idSubCampaignReflation')->index('fk_V2_emailtoshoot_V2_subcampaignreflation1_idx');
			$table->integer('idUser')->index('fk_V2_emailtoshoot_V2_user1_idx');
			$table->boolean('shootType')->nullable()->default(0)->comment('0:shoot|1:delivery');
			$table->boolean('campaignType')->nullable()->comment('0:anaconda|1:stc|2:os');
			$table->dateTime('sendDate')->nullable();
			$table->dateTime('realSendDate')->nullable();
			$table->boolean('status')->nullable()->comment('0:planifié|1:shooté avec retard|2:shooté|-1: cancelled ');
			$table->string('profileAccount', 6)->default('GA');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_emailtoshoot');
	}

}
