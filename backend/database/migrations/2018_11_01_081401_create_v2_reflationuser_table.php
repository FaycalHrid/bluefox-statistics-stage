<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ReflationuserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reflationuser', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('shootDate')->nullable();
			$table->boolean('indiceImplication')->nullable();
			$table->boolean('isNewLead')->nullable();
			$table->boolean('openerJ1')->nullable();
			$table->boolean('notOpenerJ2')->nullable();
			$table->boolean('buyerJ2')->nullable();
			$table->boolean('reactivatedLead')->nullable();
			$table->boolean('standByLead')->nullable();
			$table->boolean('buyerJ')->nullable();
			$table->boolean('openerJ2')->nullable();
			$table->boolean('notOpenerJ5')->nullable();
			$table->integer('idUser')->nullable()->index('fk_user_id');
			$table->integer('idSubCampaignReflation')->nullable()->index('fk_reflation_id');
			$table->string('email', 100)->nullable();
			$table->string('linkmailName', 45)->nullable();
			$table->unique(['email','linkmailName'], 'email');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_reflationuser');
	}

}
