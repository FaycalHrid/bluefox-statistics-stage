<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2CampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaign', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('label', 50)->nullable()->unique('label');
			$table->integer('type')->nullable();
			$table->string('ref', 50);
			$table->dateTime('date_shoot')->nullable();
			$table->dateTime('date_shoot2')->nullable();
			$table->integer('duree_shoot')->nullable();
			$table->boolean('chainable')->nullable();
			$table->boolean('split')->nullable();
			$table->integer('nb_produit')->nullable();
			$table->text('commentaire_shoot_acq', 65535)->nullable();
			$table->string('model_shoot_acq', 254)->nullable();
			$table->text('commentaire_shoot_fid', 65535)->nullable();
			$table->string('model_shoot_fid', 254)->nullable();
			$table->string('titre_stat', 254)->nullable();
			$table->boolean('asile')->nullable()->default(0);
			$table->string('num', 30)->nullable();
			$table->dateTime('date_creation_cdc_prev')->nullable();
			$table->dateTime('date_control_cdc_prev')->nullable();
			$table->dateTime('date_valid_cdc_it_prev')->nullable();
			$table->dateTime('date_dev_it_prev')->nullable();
			$table->dateTime('date_control_project_prev')->nullable();
			$table->dateTime('date_valid_project_prev')->nullable();
			$table->dateTime('date_creation_cdc')->nullable();
			$table->dateTime('date_control_cdc')->nullable();
			$table->dateTime('date_valid_cdc_it')->nullable();
			$table->dateTime('date_dev_it')->nullable();
			$table->dateTime('date_control_project')->nullable();
			$table->dateTime('date_valid_project')->nullable();
			$table->text('commentaire_palanification', 65535)->nullable();
			$table->boolean('projectStatus');
			$table->integer('numSource')->nullable();
			$table->string('porteur_source', 40)->nullable();
			$table->text('etape_envoi', 65535)->nullable();
			$table->string('type_projet', 50)->nullable();
			$table->integer('idNextCampaign')->nullable();
			$table->boolean('campaignStatus')->nullable();
			$table->integer('idChain')->default(1)->index('fk_V2_campaign_V2_chain');
			$table->boolean('isAnaconda')->nullable();
			$table->integer('idLotCampaign')->nullable()->index('fk_V2_campaign_V2_lotCampaign1_idx');
			$table->integer('position')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_campaign');
	}

}
