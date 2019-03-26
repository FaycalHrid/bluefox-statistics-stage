<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('civility', 5)->nullable();
			$table->string('firstName', 50)->nullable();
			$table->string('lastName', 50)->nullable();
			$table->dateTime('birthday')->nullable();
			$table->string('email', 100)->nullable()->index('INDEX');
			$table->text('mailCrypte', 65535)->nullable();
			$table->string('address', 250)->nullable();
			$table->string('province', 100);
			$table->string('district', 100);
			$table->string('addressComp', 100)->nullable();
			$table->string('zipCode', 12)->nullable();
			$table->string('city', 64)->nullable();
			$table->string('state', 2)->nullable();
			$table->string('country', 64)->nullable();
			$table->string('site', 5)->nullable()->default('nl');
			$table->boolean('test')->nullable()->default(0);
			$table->string('phone', 32)->nullable();
			$table->dateTime('creationDate')->nullable();
			$table->dateTime('updateTS')->nullable();
			$table->integer('score')->nullable();
			$table->boolean('optinPartner')->nullable();
			$table->boolean('optin')->nullable();
			$table->integer('visibleDesinscrire')->nullable();
			$table->string('compteEMVactif', 24)->nullable()->default('id_bluefox ');
			$table->string('password', 50)->nullable();
			$table->boolean('status')->nullable();
			$table->boolean('savToMonitor')->nullable();
			$table->text('savComments', 65535)->nullable();
			$table->string('AuthorizedIP')->nullable();
			$table->string('promo', 20)->nullable()->index('promo');
			$table->boolean('validPhoneNumber')->default(-1)->index('validPhoneNumber');
			$table->dateTime('dateValidPhone')->nullable();
			$table->smallInteger('indiceImplication')->nullable();
			$table->smallInteger('totalIndice')->nullable();
			$table->dateTime('dateGpChange')->nullable();
			$table->boolean('bannReason')->nullable();
			$table->boolean('countSoftBounce')->nullable();
			$table->dateTime('intialDate')->nullable();
			$table->dateTime('dateBanning')->nullable();
			$table->boolean('origin')->nullable()->comment('1 : intialChain | 2 : segment 3 to 2 after game in initial chain  |3 : segment 3 to 2 after purchase mono offre');
			$table->dateTime('reactivationDate')->nullable();
			$table->boolean('quarantaine')->nullable();
			$table->boolean('isMiniAnaconda')->nullable()->default(0);
			$table->date('activationDate')->nullable();
			$table->smallInteger('splitGp')->default(1);
			$table->integer('positionGraph')->nullable();
			$table->boolean('oneShoot')->nullable();
			$table->string('refSupplier', 20)->default('Default');
			$table->date('dateReprise')->nullable()->comment('date switch vers elastic email');
			$table->boolean('versionReleve')->nullable()->default(1);
			$table->string('profileAccount', 6)->nullable()->default('GA');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_user');
	}

}
