<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateV2InvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('invoiceCrypt', 250)->nullable();
			$table->string('emailUser', 100)->nullable()->index('INDEX');
			$table->dateTime('creationDate')->nullable()->index('CreationDate');
			$table->string('refInterne', 50)->nullable();
			$table->string('ref1Transaction', 50)->nullable();
			$table->string('ref2Transaction', 50)->nullable();
			$table->boolean('invoiceStatus')->nullable();
			$table->string('origine', 20)->nullable();
			$table->boolean('refundStatus')->nullable();
			$table->dateTime('refundDate')->nullable();
			$table->dateTime('modificationDate')->nullable();
			$table->decimal('parity', 13, 6)->nullable();
			$table->string('currency', 3)->nullable();
			$table->string('deviseinformativecheque', 3)->nullable();
			$table->dateTime('dateDeliveryExport')->nullable();
			$table->dateTime('dateTransfertToTransporter')->nullable();
			$table->string('paymentProcessor', 50)->nullable();
			$table->string('codeSite', 2);
			$table->integer('deliveryMode')->nullable();
			$table->integer('thyCheckView')->nullable();
			$table->integer('errorNumber')->nullable();
			$table->string('errorMessage')->nullable();
			$table->dateTime('dateFinalAnswer')->nullable();
			$table->string('campaign', 50)->nullable();
			$table->string('supportRef', 20)->nullable();
			$table->date('supportDate')->nullable();
			$table->string('subPaymentProcessor', 20)->nullable();
			$table->string('trackingNumber', 50)->nullable();
			$table->string('refBatchSelling', 5)->nullable();
			$table->integer('priceStep')->nullable();
			$table->string('refPricingGrid', 5)->nullable();
			$table->integer('idAbandonedCaddy')->nullable()->index('idAbandonnedCaddyI_idx');
			$table->decimal('pricePaid', 10)->nullable();
			$table->integer('numCheck')->nullable();
			$table->string('chrono', 60)->nullable();
			$table->dateTime('date_ouverture')->nullable();
			$table->integer('countSend')->nullable();
			$table->timestamp('lastSend')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('agent', 100)->nullable();
			$table->text('commentary', 65535)->nullable();
			$table->string('vaName', 20)->nullable();
			$table->text('vaNumber', 65535)->nullable();
			$table->dateTime('vaExpiryDate')->nullable();
			$table->index(['invoiceStatus','creationDate','emailUser'], 'invoicestatus_creationdate_emailUser');
			$table->index(['codeSite','creationDate','priceStep'], 'codeSite_creationDate_priceStep');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('v2_invoice');
	}

}
