<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2UserCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_company', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstName')->nullable();
			$table->string('lastName')->nullable();
			$table->string('email');
			$table->string('password');
			$table->string('company');
			$table->unique(['email','password'], 'email');
			$table->unique(['email','password'], 'email_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_user_company');
	}

}
