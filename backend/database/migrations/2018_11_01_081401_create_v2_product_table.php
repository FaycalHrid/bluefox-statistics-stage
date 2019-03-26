<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2ProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('productType')->nullable()->comment('1 => virtual, 2 => physical, 3 => ebook');
			$table->string('ref', 20)->nullable()->unique('ref');
			$table->integer('qty')->nullable();
			$table->decimal('priceATI', 10)->nullable();
			$table->decimal('priceVAT', 10)->nullable();
			$table->decimal('amountBif', 10)->nullable();
			$table->string('paymentType', 100)->nullable()->comment('Contient les types de paiements separé par un SEPARATEUR.');
			$table->string('description', 100)->nullable();
			$table->string('descriptionPP', 100)->nullable();
			$table->string('webSiteProductCode', 50)->nullable();
			$table->integer('isCT')->nullable();
			$table->string('titleStat', 50)->nullable();
			$table->string('abrStat', 10)->nullable();
			$table->integer('boutique')->nullable();
			$table->string('webSiteProductCodeAC', 20)->nullable();
			$table->text('commercialText', 65535)->nullable();
			$table->string('bdcFields', 200)->nullable()->default('')->comment('json encode : array( \'global\' => array( ...), \'check\' => array( ... ) )');
			$table->string('priceModel', 50);
			$table->text('paramPriceModel', 65535)->nullable();
			$table->integer('idPaymentProcessorSet')->nullable();
			$table->integer('ctdate');
			$table->decimal('theoPricePros', 13, 3);
			$table->decimal('theoPriceVg', 13, 3);
			$table->decimal('theoPriceVp', 13, 3);
			$table->decimal('theoPriceCt', 13, 3);
			$table->integer('price_step')->nullable()->default(1);
			$table->text('description_marketing', 65535)->nullable();
			$table->text('particularite_it', 65535)->nullable();
			$table->string('kdo', 254)->nullable();
			$table->text('num_c', 65535)->nullable();
			$table->text('date_a', 65535)->nullable();
			$table->text('variable_page', 65535)->nullable();
			$table->text('variable_mail', 65535)->nullable();
			$table->string('asile_type', 20);
			$table->integer('produit_expirable')->nullable();
			$table->integer('nbrelance')->nullable();
			$table->string('productType2', 30)->nullable();
			$table->text('preheader', 65535)->nullable();
			$table->text('subjectReshoot', 65535)->nullable();
			$table->text('nbMercury', 65535)->nullable();
			$table->integer('idFamily')->nullable();
			$table->index(['productType','ref'], 'INDEX');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_product');
	}

}
